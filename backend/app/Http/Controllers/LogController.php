<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogRequest;
use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Goodjob;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class LogController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Log::class, 'log');
        $this->middleware(['auth', 'verified'])->only(['goodjob', 'ungoodjob']);
    }

    public function index(Log $log, User $user)
    {
        if (Auth::user()) {
            $logs = Log::with(['comments.user'])->whereIn('user_id', Auth::user()->follows()->pluck('followee_id'))->orWhere('user_id', Auth::user()->id)->latest()->get();
        } else {
            return view('/top');
        }
        $id = $log->id;
        $goodjob = Goodjob::all()->first;

        return view('logs.index', compact('logs', 'id', 'goodjob', 'user'));
    }

    public function create(Log $log)
    {
        $user = Auth::user();
        return view('logs.create', compact('log', 'user'));
    }

    public function store(LogRequest $request, Log $log)
    {
        $log->fill($request->all());
        $log->user_id = $request->user()->id;
        $log->save();
        return redirect()->route('logs.index');
    }


    public function edit(Log $log)
    {
        return view('logs.edit', compact('log'));
    }

    public function update(LogRequest $request, Log $log)
    {
        $log->fill($request->all())->save();
        return redirect()->route('logs.index');
    }

    public function destroy(Log $log)
    {
        $log->delete();
        return redirect()->route('logs.index');
    }

    public function show(Log $log, Goodjob $goodjob)
    {
        return view('logs.show', compact('log', 'goodjob'));
    }

    public function goodjob($id)
    {
        Goodjob::create([
            'log_id' => $id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back();
    }

    public function ungoodjob($id)
    {
        $goodjob = Goodjob::where('log_id', $id)->where('user_id', Auth::id())->first();
        $goodjob->delete();

        return redirect()->back();
    }

    public function search(Request $request, User $user)
    {
        $search = $request->search;
        $logs = Log::where('body', 'like', "%{$request->search}%")->get();

        return view('logs.search', compact('logs', 'user', 'search'));
    }
}
