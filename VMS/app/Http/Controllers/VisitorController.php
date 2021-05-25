<?php

namespace App\Http\Controllers;
use App\Visitor;
use Illuminate\Http\Request;
use Twilio\Rest\Client; 

class VisitorController extends Controller
{
    public function add(Request $request)
  {
  
    $sid = "AC0aad29db4e4ad5469b2acda89a5f3092"; // Your Account SID from www.twilio.com/console
$token = "4e39d6377a0465835ec8c0898febbcd3"; // Your Auth Token from www.twilio.com/console

$client = new Client($sid, $token);
$message = $client->messages->create(
  $request->get('phone'), // Text this number
  [
    'from' => '14024152696', // From a valid Twilio number
    'body' => 'welcome test is there a repetition?'
  ]
);
    
     $visitor  = new Visitor([
              'name' => $request->get('name'),
              'phone' => $request->get('phone'),
              'email' => $request->get('email'),
              'purpose' => $request->get('purpose'),
              'visitor_image'=> $request->get('capture'),
           ]);
        $visitor->save();
       
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
