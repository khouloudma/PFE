<?php

namespace App\Http\Controllers;
use App\Visitor;
use App\Feedback;
use App\Mail\codeEmail;
use Illuminate\Http\Request;
use Twilio\Rest\Client; ;
use DB;

use Illuminate\Support\Facades\Mail;
class VisitorController extends Controller
{
    public function add(Request $request)
  { 

    $errors = array();
    $uniques = array();
    for($i = 0; $i < 500; ++$i)
    {
    $random_code = mt_rand(10000, 99999);
    if(!in_array($random_code, $uniques))
    {
        $uniques[] = $random_code;

    }  
    }
        
        $first=$uniques[1];
       
      $validateData=$request->validate([
        'name' => ['required', 'string', 'max:255' ,'min:2'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone' => ['required', 'integer','min:1000000000','max:99999999999'],
        'purpose' => ['required', 'string', 'max:1500','min:4'],
      ]);
        $email=$request->get('email');
          if(Visitor::where('email', '=', $request->get('email'))->exists()){
           $visitor= Visitor::where('email',$email)->update(['frequentlyVisted' => DB::raw('frequentlyVisted + 1'),'code'=>$first]);
           $visitor= Visitor::where('email',$email)->update(['checkout_date' => NULL]);
           $visitor= Visitor::where('email',$email)->update(['purpose' => $request->get('purpose')]);

           $visitor= Visitor::where('email',$email)->get()->first();

         /*   $sid = "AC69387f79c7d2b35de37e22396964a699"; // Your Account SID from www.twilio.com/console
           $token = "dca149c040bb466f31ee6ec25b951199"; // Your Auth Token from www.twilio.com/console
           $name=$request->get('name');
           $client = new Client($sid, $token);
           $message = $client->messages->create(
           $request->get('phone'), // Text this number
           [
           'from' => '15403089072', // From a valid Twilio number
           'body' => 'welcome :'.$name.' '.'this is your code : '.$first,
           ]
       ); */  
                  }else{
                  /*   $sid = "AC69387f79c7d2b35de37e22396964a699"; // Your Account SID from www.twilio.com/console
                    $token = "dca149c040bb466f31ee6ec25b951199"; // Your Auth Token from www.twilio.com/console
                    $name=$request->get('name');
                    $client = new Client($sid, $token);
                    $message = $client->messages->create(
                    $request->get('phone'), // Text this number
                    [
                    'from' => '15403089072', // From a valid Twilio number
                    'body' => 'welcome :'.$name.' '.'this is your code : '.$first,
                    ]
                );  */ 

      $data=[
        'name'=> $request->get('name'),
        'code'=> $first,
        'email' => $request->get('email')
      ];
      Mail::to($request->get('email'))->send(new codeEmail($data));

     $visitor  = new Visitor([
                    'name' => $request->get('name'),
                    'phone' => $request->get('phone'),
                    'email' => $request->get('email'),
                    'purpose' => $request->get('purpose'),
                    'visitor_image'=> $request->get('visitor_image'),
                    'code'=> $first,
                   'frequentlyVisted'=> '1',
                   'id_user'=>$request->get('id_user'),

                ]); 
              $visitor->save();}
          
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
  public function feedback(Request $request)
  {

    $feedback  = new Feedback([

      'comments' => $request->get('comment'),
      'rating' => $request->get('experience'),
      'id_user' => auth()->user()->id,
      'id_visitor' => $request->get('id_vistor'),
     ]);

  $feedback->save();
  return view('feedback');
  }
 
}
