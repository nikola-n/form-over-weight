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
}
