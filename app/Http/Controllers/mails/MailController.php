<?php

namespace App\Http\Controllers\mails;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function welcome()
    {
        Mail::to(auth()->user()->email)->send(new WelcomeMail(auth()->user()->email, auth()->user()->name));
        session()->flash("success", "Вы зарестрерировались");
        return redirect()->route("home");
    }

}
