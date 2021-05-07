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
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Contact
     */
    public function AddContact(array $data)
    {
        return Contact::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'message' => $data['message'],
        ]);
    }
    
}
