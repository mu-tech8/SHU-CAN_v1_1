<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Goodjob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        $users = User::all()->sortByDesc('created_at');

        return view('users.index', compact('users'));
    }

    public function show(User $user)
    {
        $user = User::where('id', $user->id)->first();
        $logs = $user->logs->sortByDesc('created_at');
        $goodjob = Goodjob::with('id');
        $goodjobs = $user->goodjobs()->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('users.show', compact('user', 'logs', 'goodjob', 'goodjobs'));
    }

    public function follow(User $user)
    {
        $follower = Auth::user();
        $is_following = $follower->isFollowing($user->id);
        if (!$is_following) {
            $follower->follow($user->id);
            return back();
        }
    }

    public function unfollow(User $user)
    {
        $follower = Auth::user();
        $is_following = $follower->isFollowing($user->id);
        if ($is_following) {
            $follower->unfollow($user->id);
            return back();
        }
    }

    public function followings(User $user)
    {
        $user = User::where('id', $user->id)->first();
        $followings = $user->follows->sortByDesc('created_at');
        return view('users.followings', compact('user', 'followings'));
    }
    public function followers(User $user)
    {
        $user = User::where('id', $user->id)->first();
        $followers = $user->followers->sortByDesc('created_at');
        return view('users.followers', compact('user', 'followers'));
    }
}
