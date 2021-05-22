<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\visitor;



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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function profile()
    {
        return view('profile');
    }
    public function visitor()
    {
        $visitor = Visitor::get();
        return view('visitorLog',compact('visitor'));
    }
    public function checkin()
    {
        return view('checkin');
    }
       public function checkout()
    {
        return view('checkout');
    }
    public function checkinsucess()
    {
        return view('check-in-succes');
    }
}
