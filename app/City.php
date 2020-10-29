<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'gym_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gym()
    {
        return $this->hasMany(Gym::class);
    }
}
