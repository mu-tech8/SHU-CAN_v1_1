<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'learn_time',
        'body',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    public function goodjobs(): HasMany
    {
        return $this->hasMany('App\Models\Goodjob');
    }


    public function is_goodjobed_by_auth_user()
    {
        $id = Auth::id();

        $goodjobers = array();
        foreach ($this->goodjobs as $goodjob) {
            array_push($goodjobers, $goodjob->user_id);
        }

        if (in_array($id, $goodjobers)) {
            return true;
        } else {
            return false;
        }
    }
}
