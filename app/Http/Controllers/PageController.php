<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $title = "ABOUT";
        return view("pages.about", compact("title"));
    }
}
