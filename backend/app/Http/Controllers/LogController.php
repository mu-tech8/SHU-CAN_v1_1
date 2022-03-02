<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        // ダミーデータ
        $logs = [
            (object) [
                'id' => 1,
                'learn_time' => '15',
                'body' => '本文1',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 1,
                    'name' => 'ユーザー名1',
                ],
            ],
            (object) [
                'id' => 2,
                'learn_time' => '25',
                'body' => '本文2',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 2,
                    'name' => 'ユーザー名2',
                ],
            ],
            (object) [
                'id' => 3,
                'learn_time' => '35',
                'body' => '本文3',
                'created_at' => now(),
                'user' => (object) [
                    'id' => 3,
                    'name' => 'ユーザー名3',
                ],
            ],
        ];

        return view('logs.index', compact('logs'));
    }
}
