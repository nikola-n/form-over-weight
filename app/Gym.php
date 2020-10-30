<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'city_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trainer()
    {
        return $this->belongsToMany(Trainer::class, 'gyms_trainers', 'trainer_id');
    }
}
