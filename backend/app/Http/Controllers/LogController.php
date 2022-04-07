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

    public function index(Log $log)
    {
        $logs = Log::all()->sortByDesc('created_at');
        $id = $log->id;
        $goodjob = Goodjob::all()->first;
        $user = User::where('id', $id)->first();

        return view('logs.index', compact('logs', 'id', 'goodjob', 'user'));
    }

    public function create(Log $log)
    {
        return view('logs.create', compact('log'));
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

        return view('logs.show', compact('log'));
    }

    public function goodjob($id)
    {
        Goodjob::create([
            'log_id' => $id,
            'user_id' => Auth::id(),
        ]);

        // session()->flash('success', 'You goodjobd the log.');

        return redirect()->back();
    }

    public function ungoodjob($id)
    {
        $goodjob = Goodjob::where('log_id', $id)->where('user_id', Auth::id())->first();
        $goodjob->delete();

        // session()->flash('success', 'You Ungoodjobd the log.');/

        return redirect()->back();
    }
}
