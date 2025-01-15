<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Goal extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'start_date',
        'end_date',
        'status',
        'priority'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    /**
     * Get the user that owns the Goal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
