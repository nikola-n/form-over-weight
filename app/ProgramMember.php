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
        'member_id',
        'trainer_id',
        'program_id',
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
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function trainer()
    {
        return $this->belongsTo(Trainer::class, 'trainer_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
