<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Post;
use App\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function post_edit($id)
    {
        $title = "EDIT POST";
        $post = Post::find($id);
        $rubrics = Rubric::pluck("title", "id");
        return view("user.post_edit", compact("title", "id", "post", "rubrics"));
    }

    public function post_store(Request $request, $id)
    {
        $request->validate([
            "title" => "required|max:255",
            "content" => "nullable",
            "rubric_id" => "required|integer",
            "img" => "nullable|image"
        ]);
        if ($request->hasFile("img")) {
            $folder = date("Y-m-d");
            $img = $request->file("img")->store("post_images/{$folder}");
        }
        $def_post = Post::find($id);
        Post::where("id", "=", $id)->update([
            "title" => $request->title,
            "content" => $request->content,
            "rubric_id" => $request->rubric_id,
            "img" => $img ?? $def_post->img
        ]);
        return redirect()->route("user.profile.post.edit", ["id" => $id]);
    }

    public function post_delete(Request $request, $id)
    {
        $post = Post::find($id);
        Storage::delete("$post->img");
        $post->delete();
        return redirect()->route("user.profile.posts");
    }
}
