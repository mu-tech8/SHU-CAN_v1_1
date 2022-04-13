<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;



class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'self_introduction',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function logs(): HasMany
    {
        return $this->hasMany('App\Models\Log');
    }

    public function goodjobs(): HasMany
    {
        return $this->hasMany('App\Models\Goodjob');
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'relationships', 'followee_id', 'follower_id');
    }

    public function follows(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'relationships', 'follower_id', 'followee_id');
    }

    // フォローする
    public function follow(Int $user_id)
    {
        return $this->follows()->attach($user_id);
    }

    // フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->follows()->detach($user_id);
    }

    // フォローしているか
    public function isFollowing(Int $user_id)
    {
        return (bool) $this->follows()->where('followee_id', $user_id)->first();
    }

    // フォローされているか
    public function isFollowed(Int $user_id)
    {
        return (bool) $this->followers()->where('follower_id', $user_id)->first();
    }

    public function getCountFollowersAttribute(): int
    {
        return $this->followers->count();
    }

    public function getCountFollowsAttribute(): int
    {
        return $this->follows->count();
    }
}
