<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Goodjob;
use App\Models\Log;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(User $user)
    {
        $users = User::all()->sortByDesc('created_at');

        return view('users.index', compact('users'));
    }

    public function show(User $user, Log $log)
    {
        $user = User::with(['logs.goodjobs'])->where('id', $user->id)->first();
        $logs = $user->logs->sortByDesc('created_at');
        $goodjob = Goodjob::with('id');
        $goodjobs = $user->goodjobs()->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        $users = User::with(['comments.log'])->where('id', $log->user_id)->first();
        $comments = $user->comments()->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('users.show', compact('user', 'users', 'logs', 'goodjob', 'goodjobs', 'comments'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {
        $user->fill($request->all())->save();
        return redirect()->route('users.show', ['user' => Auth::user()->id]);
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

    public function updateImage(Request $request, User $user)
    {
        $file_name = $request->profile_image->getClientOriginalName();
        $img = isset($file_name) ? $request->profile_image->storeAs("", $file_name, 'public') : '';
        User::where('id', Auth::user()->id)->update(['profile_image' => $img]);
        return redirect()->route('users.show', ['user' => Auth::user()->id]);
    }
}
