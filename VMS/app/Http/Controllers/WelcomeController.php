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
   
}
