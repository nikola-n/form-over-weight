<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public static function booted()
    {
        static::created(function ($user) {
            if ($user->role == 'trainer') {
                $user->trainer()->create(['name' => $user->name]);
            }

            if ($user->role == 'member') {
                $user->member()->create([
                    'name'    => $user->name,
                    'user_id' => $user->id,
                    'gym_id' => request('member-gyms'),
                ]);
            }
        });

    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function trainer()
    {
        return $this->hasOne(Trainer::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function member()
    {
        return $this->hasOne(Member::class);
    }

    /**
     * @return bool
     */
    public function isMember()
    {
        return $this->role == 'member';
    }

    /**
     * @return bool
     */
    public function isTrainer()
    {
        return $this->role == 'trainer';
    }
}
