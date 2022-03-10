<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Goodjob extends Model
{
    use HasFactory;

    protected $fillable = [
        'log_id',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function log(): BelongsTo
    {
        return $this->belongsTo('App\Models\Log');
    }
}
