<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $post_id)
    {
        $request->validate([
            "text" => "required"
        ]);
        Comment::create([
            "post_id" => $post_id,
            "user_id" => Auth::user()->id,
            "text" => $request->text
        ]);
        return redirect()->back();
    }
}
