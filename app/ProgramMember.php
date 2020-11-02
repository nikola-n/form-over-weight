<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgramMember extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'start_date',
        'end_date',
        'user_id',
        'trainer_id',
        'program_id',
        'gym_id',
    ];

    /**
     * @var string[]
     */
    protected $dates = [
        'start_date',
        'end_date',
    ];

    /**
     * @var string
     */
    protected $table = 'program_members';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gym()
    {
        return $this->belongsTo(Gym::class, 'gym_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }

    /**
     * @return mixed
     */
    public function getTrainerNameAttribute()
    {
        return User::where('id', $this->trainer_id)->first()->name;
    }
}
