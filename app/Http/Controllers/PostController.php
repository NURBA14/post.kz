<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\Rubric;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class PostController extends Controller
{
    public function create()
    {
        $rubrics = Rubric::pluck("title", "id")->all();
        $title = "POST CREATE";
        return view("pages.create", compact("title", "rubrics"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|min:5|max:255",
            "content" => "required",
            "rubric_id" => "required|integer",
            "img" => "required|image"
        ]);
        $folder = date("Y-m-d");
        $img = $request->file("img")->store("post_images/{$folder}");
        Post::create([
            "title" => $request->title,
            "content" => $request->content,
            "rubric_id" => $request->rubric_id,
            "img" => $img,
            "user_id" => Auth::user()->id
        ]);
        $request->session()->flash("success", "Данные сохранены");
        return redirect()->route("home");
    }

    public function post_view($id)
    {
        $post = Post::with("comments")->find($id);
        $comments = Comment::with("user")->where("post_id", "=", $id)->get();
        $title = "POST";
        return view("pages.post", compact("title", "post", "comments"));
    }


    public function user_bridge($id)
    {
        $user = User::find($id);
        $title = "$user->name";
        $posts = $user->posts()->orderBy("created_at", "DESC")->paginate(6);
        return view("pages.user_bridge", compact("title", "user", "posts"));
    }
}
