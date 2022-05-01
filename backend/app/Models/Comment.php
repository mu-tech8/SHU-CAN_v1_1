<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'log_id',
        'user_id',
    ];

    public function log(): BelongsTo
    {
        return $this->belongsTo('App\Models\Log');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }
}
