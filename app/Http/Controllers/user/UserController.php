<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function profile()
    {
        $title = "PROFILE";
        $posts_count = count(Auth::user()->posts);
        return view("user.profile", compact("title", "posts_count"));
    }
    public function profile_edit()
    {
        $title = "PROFILE EDIT";
        return view("user.profile_edit", compact("title"));
    }

    public function profile_edit_store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "description" => "nullable|max:255",
            "instagram" => "nullable|max:255",
            "telegram" => "nullable|max:255",
            "avatar" => "nullable|image"
        ]);
        if ($request->hasFile("avatar")) {
            $folder = date("Y-m-d");
            $img = $request->file("avatar")->store("users_avatar/{$folder}");
        } else {
            $img = Auth::user()->avatar;
        }
        User::where("id", "=", Auth::user()->id)->update([
            "name" => $request->name,
            "description" => $request->description,
            "instagram" => $request->instagram,
            "telegram" => $request->telegram,
            "avatar" => $img
        ]);
        $request->session()->flash("success", "Данные сохранены");
        return redirect()->route("user.profile");
    }

    public function user_posts()
    {
        $posts = Auth::user()->posts()->with("rubric")->orderBy("created_at", "DESC")->paginate(6);
        $title = "MY POSTS";
        return view("user.user_posts", compact("title", "posts"));
    }

}
