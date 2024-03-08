<?php

namespace App\Http\Controllers\security;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegController extends Controller
{
    public function index()
    {
        $title = "REGISTRATION";
        return view("security.reg", compact("title"));
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|confirmed"
        ]);
        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);
        Auth::login($user);
        session()->flash("success", "Вы зарестрерировались");
        return redirect()->route("home");
    }
}
