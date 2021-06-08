<?php

namespace App\Http\Controllers;
use App\testomonial;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $testomonial = testomonial::get();
        return view("welcome",compact('testomonial'));

    }
    public function features() {
        return view('features');
    }
    public function contact() {
        return view('contact');
    }
    public function privacy() {
        return view('privacy');}
}
