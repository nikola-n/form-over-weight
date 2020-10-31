<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    /**
     * Attach ids to gyms_trainers pivot table
     */
    public static function booted()
    {
        static::created(function ($trainer) {
            $trainer->gym()->attach(request('gyms'));
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
        return $this->belongsToMany(Gym::class, 'gyms_trainers', 'trainer_id', 'gym_id')->withTimestamps();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function programMember()
    {
        return $this->hasMany(ProgramMember::class);
    }

}
