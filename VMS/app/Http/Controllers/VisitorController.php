<?php

namespace App\Http\Controllers;
use App\Visitor;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class VisitorController extends Controller
{
    public function add(Request $request)
  {
  
    
    
     $visitor  = new Visitor([
              'name' => $request->get('name'),
              'phone' => $request->get('phone'),
              'email' => $request->get('email'),
              'purpose' => $request->get('purpose'),
              'visitor_image'=> $request->get('capture'),
           ]);
        $visitor->save();
        Nexmo::message()->send([
          'to'   => '21693887912',
          'from' => '16105552344',
          'text' => 'kan wsolek nmdelek 10dt.'
      ]);
    return view('check-in-succes',compact('visitor'));

  }
  public function store(Request $request)
  {
          
         $visitor  = new Visitor([

            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'purpose' => $request->get('purpose'),
            'visitor_image' => $request->get('capture'),
           ]);

        $visitor->save();
        return redirect('/check-in-success/'.$visitor)->with('success', ' ajouté  ');

  }
 
}
