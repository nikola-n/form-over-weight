<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    /**
     * delete gym when city is deleted
     */
    //public static function booted()
    //{
    //    static::deleting(function ($city) {
    //        $city->gym()->delete();
    //    });
    //}

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function gym()
    {
        return $this->hasMany(Gym::class, 'city_id');
    }
}
