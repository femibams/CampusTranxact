<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;
use Mail;
use App\User;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    /**
     * Show the application sendMail.
     *
     * @return \Illuminate\Http\Response
     */
     public function send(){
        $user =Auth::user();
       // dd($user);
        Mail::to('elteeto11@gmail.com')->send(new Contact());
        
     }
}