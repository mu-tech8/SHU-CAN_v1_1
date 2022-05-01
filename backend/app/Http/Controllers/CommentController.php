<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;



class CommentController extends Controller
{
    public function store(CommentRequest $request, Comment $comment, Log $log)
    {
        $comment->fill($request->all());
        $comment->log_id = $request->log_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        return redirect()->route('logs.show', ['log' => $request->log_id]);
    }

    public function destroy(CommentRequest $request)
    {
        $comment = Comment::find($request->comment_id);
        $comment->delete();
        return redirect('/')->route('logs.show', ['log' => $request->log_id]);;
    }
}
