<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MyTestMail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function myTestMail()
    {
        $message = "body of the message";
        $myEmail = 'yd4u2c@yahoo.com';
        Mail::to($myEmail)->send(new MyTestMail($message));


        dd("Mail Send Successfully");
    }

    public function confirm()
    {
      return view('confirm');
    }

}
