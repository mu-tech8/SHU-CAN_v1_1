<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogRequest;
use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function index()
    {
        $logs = Log::all()->sortByDesc('created_at');

        return view('logs.index', compact('logs'));
    }

    public function create()
    {
        return view('logs.create');
    }

    public function store(LogRequest $request, Log $log)
    {
        $log->fill($request->all());
        $log->user_id = $request->user()->id;
        $log->save();
        return redirect()->route('logs.index');
    }
}
