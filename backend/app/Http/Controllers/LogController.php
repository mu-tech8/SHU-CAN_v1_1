<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogRequest;
use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Log::class, 'log');
    }

    public function index(Log $log)
    {
        $logs = Log::all()->sortByDesc('created_at');
        $id = $log->id;
        return view('logs.index', compact('logs', 'id'));
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

    public function show(Log $log)
    {
        return view('logs.show', compact('log'));
    }
}
