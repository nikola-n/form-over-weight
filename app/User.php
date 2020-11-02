<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasFactory;


    public const ROLE_MEMBER = 'member';

    public const ROLE_TRAINER = 'trainer';

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programMember()
    {
        return $this->hasMany(ProgramMember::class);
    }

    public function gyms()
    {
        return $this->belongsToMany(Gym::class, 'program_members', 'user_id', 'gym_id');
    }

    /**
     *
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
