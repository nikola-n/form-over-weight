<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{

    /**
     * Attach ids to gyms_trainers pivot table
     */
    public static function booted()
    {
        static::created(function ($trainer) {
            $trainer->gym()->attach(request('gyms'), ['trainer_id' => $trainer->id]);
        });
    }

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function gym()
    {
        return $this->belongsToMany(Gym::class, 'gyms_trainers', 'gym_id','trainer_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programMember()
    {
        return $this->hasMany(ProgramMember::class);
    }

}
