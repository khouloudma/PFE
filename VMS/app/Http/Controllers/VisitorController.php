<?php

namespace App\Http\Controllers;
use App\Visitor;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function add(Request $request)
  {
     $name='';
     if($request->file('capture')!=null)
    {$image=$request->file('capture');
     $name =  $image->getClientOriginalName();
                 $path = storage_path()."/images/";
      $date=date('d-m-Y-H-i-s');
    //$name=$name.'-service-'.$date ;
    
         $image->move($path,  $name );
    }
    
     $visitor  = new Visitor([
              'name' => $request->get('name'),
              'phone' => $request->get('phone'),
              'email' => $request->get('email'),
              'purpose' => $request->get('purpose'),
              'visitor_image'=>$name,
           ]);
 
        $visitor->save();
    return view('check-in-succes',compact('visitor'));

  }
  public function store(Request $request)
  {
        $name='';
    if($request->file('capture')!=null)
    {$image=$request->file('capture');
     $name =  $image->getClientOriginalName();
                 $path = storage_path()."/images/";
      $date=date('d-m-Y-H-i-s');
    $name=$name.'-visitor-'.$date ;
         $image->move($path,  $name );
    }
               
         $visitor  = new Visitor([

            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'purpose' => $request->get('purpose'),
            'visitor_image' => $name,
           ]);

        $visitor->save();
        return redirect('/check-in-success/'.$visitor)->with('success', ' ajouté  ');

  }
 
}
