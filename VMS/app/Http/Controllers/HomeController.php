<?php

namespace App\Http\Controllers;
use App\testomonial;
use Illuminate\Http\Request;
use App\Contact;



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
        return view('welcome');
    }
    public function testomonial()
    {
        $testomonial = testomonial::get();
        return view("welcome",compact('testomonial'));


    }
}
