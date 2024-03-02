<?php

namespace App\Http\Controllers\security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $title = "LOGIN";
        return view("security.login", compact("title"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required",
            "remember_me" => "nullable"
        ]);
        if (!empty($request->remember_me)) {
            $remember_me = true;
        } else {
            $remember_me = false;
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember_me)) {
            $request->session()->flash("success", "Вы авторизовались");
            return redirect()->route("home");
        }
        $request->session()->flash("success", "Вы не авторизовались");
        return redirect()->route("login.create");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route("login.create");
    }
}
