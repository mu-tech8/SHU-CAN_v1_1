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
    // public function index(User $user)
    // {
    //     $users = User::all()->sortByDesc('created_at');

    //     return view('users.index', compact('users'));
    // }

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

    public function showGraph(Request $request, User $user)
    {
        $auth_user = Auth::user();
        if ($user->id !== $auth_user->id) {
            abort(404);
        }

        $monthly_labels = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthly_labels[] .= "{$i}月";
        };
        $daily_labels = [];
        for ($i = 1; $i <= date('t'); $i++) {
            $daily_labels[] .= "{$i}日";
        }

        $sum_learn_time_log = $this->getMonthlyLearnTime($auth_user);
        $daily_sum_learn_time_log = $this->getDailyLearnTime($auth_user);
        return view('users.graph', compact('auth_user', 'monthly_labels', 'daily_labels', 'sum_learn_time_log', 'daily_sum_learn_time_log'));
    }

    public function getMonthlyLearnTime($auth_user)
    {
        $target_days = [];
        $current_year = date('Y');
        for ($i = 1; $i <= 12; $i++) {
            if ($i <= 9) {
                $target_days[] .= "{$current_year}-0{$i}";
            } else if ($i > 9) {
                $target_days[] .= "{$current_year}-{$i}";
            }
        };
        foreach ($target_days as $data_key) {
            $sum_learn_time_log[] = $this->getSumLearnTimeLog($auth_user, $data_key);
        }
        return $sum_learn_time_log;
    }

    public function getDailyLearnTime($auth_user)
    {
        $target_days = [];
        $current_year = date('Y');
        $current_month = date('m');
        for ($i = 1; $i <= date('t'); $i++) {
            if ($i <= 9) {
                $target_days[] .= "{$current_year}-{$current_month}-0{$i}";
            } else if ($i > 9) {
                $target_days[] .= "{$current_year}-{$current_month}-{$i}";
            }
        };
        foreach ($target_days as $data_key) {
            if (null) {
                $daily_sum_learn_time_log[] = 0;
            }
            $daily_sum_learn_time_log[] = $this->getSumLearnTimeLog($auth_user, $data_key);
        }
        return $daily_sum_learn_time_log;
    }

    public function hourToMinutes($learn_time)
    {
        $time = explode(':', $learn_time);
        $minutes = $time[0] * 60 + $time[1];
        return $minutes;
    }

    public function sumMinutesToTime($sum_minutes)
    {
        $hour = floor($sum_minutes / 60);
        $minutes = floor($sum_minutes % 60);
        $sum_time = sprintf("%2d:%02d:%02d", $hour, $minutes);
        return $sum_time;
    }

    public function getSumLearnTimeLog($auth_user, $date_key)
    {
        $logs = Log::where("user_id", $auth_user->id)->where("created_at", "like", $date_key . "%")->get();

        $sum_minutes = 0;
        foreach ($logs as $log) {
            $learn_time = $this->hourToMinutes($log->learn_time);
            $sum_minutes += $learn_time;
        }
        return $sum_minutes;
    }
}
