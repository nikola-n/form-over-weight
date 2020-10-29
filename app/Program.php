<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /**
     * @var array
     */
    protected $fillable = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trainer()
    {
        return $this->belongsTo(Program::class);
    }
}
