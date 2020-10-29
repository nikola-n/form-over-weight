<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function program()
    {
        return $this->hasMany(Trainer::class);
    }

}
