<?php

namespace App\Http\Controllers;

use App\Post;
use App\Rubric;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::with("rubric", "user")->orderBy("created_at", "DESC")->paginate(6);
        $title = "HOME";
        return view("home", compact("title", "posts"));
    }

    public function search(Request $request)
    {
        $posts = Post::with("rubric", "user")->where("title", "LIKE", "%" . $request->search . "%")->paginate(6);
        $count = Post::where("title", "LIKE", "%" . $request->search . "%")->count();
        if (count($posts) > 0) {
            $title = "SEARCH";
            $request->session()->flash("count", "Найдено " . $count);
            return view("pages.search", compact("title", "posts"));
        } else {
            $request->session()->flash("error", "Не найдено");
            return redirect()->route("home");
        }
    }
}
