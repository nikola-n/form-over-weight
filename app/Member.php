<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [];

    public function trainer()
    {
        return $this->belongsToMany(Trainer::class);
    }

    public function program()
    {
        return $this->belongsToMany(Program::class);
    }


}
