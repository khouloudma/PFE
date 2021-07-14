<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\visitor;
use App\visit;
use App\User;
use App\Service;
use App\Department;
use Session;
use Illuminate\Support\Facades\Mail;
use Alert;

use App\Feedback;
use App\parameter;
use App\Event;
use App\Mail\codeEmail;

use DB;
use Carbon\Carbon;
use App\availability;
use SimpleSoftwareIO\QrCode\Facades\QrCode;





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
        $user = auth()->user();
        $visitor = Visitor::where('id_user',$user->id)->where('checkout_date',NULL)->count();
        $topVisited_id=Visitor::where('id_user',$user->id)->max('frequentlyVisted');
        $topVisited_list=Visitor::where('id_user',$user->id)->whereBetween('frequentlyVisted', array(1, $topVisited_id))->orderBy('frequentlyVisted', 'DESC')
        ->limit('3')->get();
        $vistortop= Visitor::where('id_user',$user->id)->where('frequentlyVisted',$topVisited_id)->get()->first();
        $feedback=Feedback::where('id_user', $user->id)->get();
        return view('home')->with(compact('user','feedback','vistortop','topVisited_list','visitor'));
    }
    public function profile()
    {
        return view('profile');
    }
    public function visitor()
    
    {  

        
        $user = auth()->user();
        $parameter = parameter::where('id_user',$user->id)->first();
        $allusers=User::where('role','entreprise')->get();
        $visitor = Visitor::where('id_user',$user->id)->where('checkout_date',NULL)->get();
        return view('visitorLog',compact('visitor','allusers','parameter'));
      
    }
    public function removeVisitor($id)
    { $visitor= Visitor::where('id',$id)->first()->update(['frequentlyVisted' => DB::raw('frequentlyVisted - 1')]);
        Visitor::where('id',$id)->delete();
        return redirect()->back();


    }
    public function history()
    {
        $user = auth()->user();
        $visit = Visit::where('id_user',$user->id)->get();
        $parameter = parameter::where('id_user',$user->id)->first();
        return view('history',compact('visit','parameter'));
      
    }
    public function checkin()
    {           $user = auth()->user();
     
    $services=Service::where('id_user',$user->id)->where('state','=','open time')->get()->all();

        $parameter = parameter::where('id_user',$user->id)->first();
        return view('checkin',compact('parameter','services'));
    }
       public function checkout()
    {
        $visitor = Visitor::get();
        return view('checkout',compact('visitor'));
    }
    public function checkoutsuccess(Request $request){
        
          $code=$request->get('text');

          $visitor = Visitor::where('code',$code)->first();
        if($visitor)
        {   
            $visitor = Visitor::where('code',$code)->update(array('checkout_date'=>now()));
            $visit= Visit::where('code',$code)->update(array('checkout_date'=>now()));
            $visitor = Visitor::where('code',$code)->first();

            return view('checkout_success',compact('visitor'));
            
        }elseif(empty($visitor)){
            Session::flash('failure', 'the code entred is incorrect !!');
            return view('checkout');};
    }

    public function checkoutsuccess2(Request $request){
        
        $code=$request->get('text');

        $visitor = Visitor::where('code',$code)->first();
      if($visitor)
      {   
          $visitor = Visitor::where('code',$code)->update(array('created_at'=>now()));
          $visit= Visit::where('code',$code)->update(array('created_at'=>now()));
          $visitor = Visitor::where('code',$code)->first();

          return view('pre_appointment_checkin0',compact('visitor'));
          
      }elseif(empty($visitor)){
          Session::flash('failure', 'the code entred is incorrect !!');
          return view('pre_appointment_checkin');};
  }
    public function checkinsucess()
    {       
            
        return view('check-in-succes');
    }
    public function search(Request $request)
    {
       
            $name=$request->get('name');
            $visitor= Visitor::where('name','LIKE','%'.$name.'%')->paginate(5);
            return view('history',compact('visitor'));
        
    }
    public function searchvisitor(Request $request)
    {
       
            $name=$request->get('name');
            $visitor= Visitor::where('checkout_date',NULL)->where('name','LIKE','%'.$name.'%')->paginate(5);
            return view('visitorLog',compact('visitor'));
        
    }
    public function removeUser($id)
    {   
         User::where('id',$id)->delete();
        return redirect()->back();

	}
    public function forms()
    {   
        $user = auth()->user();
        $parameter = parameter::where('id_user',$user->id)->first();
        return view('forms',compact('parameter'));

	}
    public function parametrage(Request $request)
    {
       
        if(!($request->get('requirefield1'))){
            $requirefield1='off';
        }else{
            $requirefield1='on';
        }
        if(!($request->get('requirefield2'))){
            $requirefield2='off';
        }else{
            $requirefield2='on';
        }
        if(!($request->get('requirefield3'))){
            $requirefield3='off';
        }else{
            $requirefield3='on';
        }
        if(!($request->get('enablefield1'))){
            $enablefield1='off';
        }else{
            $enablefield1='on';
        }
        if(!($request->get('enablefield2'))){
            $enablefield2='off';
        }else{
            $enablefield2='on';
        }  if(!($request->get('enablefield3'))){
            $enablefield3='off';
        }else{
            $enablefield3='on';
        }
        if(!($request->get('requireCapture'))){
            $requireCapture='off';
        }else{
            $requireCapture='on';
        }
        if(!($request->get('requirePrinter'))){
            $requirePrinter='off';
        }else{
            $requirePrinter='on';
        }
        $user = auth()->user();
        $parameter  = parameter::where('id_user',$user->id)->first();
    
        if(!empty($parameter))
        {
           
        $parameter  = parameter::where('id_user',$user->id)->update(['field1' => $request->get('field1'),'field2' => $request->get('field2'),'field3' => $request->get('field3'),
            'requirefield1' => $requirefield1,
            'requirefield2' => $requirefield2,
            'requirefield3' => $requirefield3,
            'enablefield1' => $enablefield1,
            'enablefield2' => $enablefield2,
            'enablefield3' => $enablefield3,
            'requireCapture'=> $requireCapture,
            'requirePrinter'=> $requirePrinter,
  
        ]); 
        $parameter  = parameter::where('id_user',$user->id)->first();
        Alert::success('Success','Parameters updated successfully');

      return view('forms',compact('parameter'));}
      else{
        parameter::create([
            'id_user'=>$user->id,
            'field1' => $request->get('field1'),'field2' => $request->get('field2'),'field3' => $request->get('field3'),
        'requirefield1' => $requirefield1,
        'requirefield2' => $requirefield2,
        'requirefield3' => $requirefield3,
        'enablefield1' => $enablefield1,
        'enablefield2' => $enablefield2,
        'enablefield3' => $enablefield3,
        'requireCapture'=> $requireCapture,
        'requirePrinter'=> $requirePrinter,]);

 Alert::success('Success','Parameters saved successfully');

      return view('forms',compact('parameter'));

      }
  
    
      
    }
    public function calender(){
        $user = auth()->user();

        $services=Department::where('id_user',$user->id)->get()->all();
        return view('full-calender',compact('services'));
    }
    public function pre_appointment(){
         
        $user = auth()->user();
        $parameter = parameter::where('id_user',$user->id)->first();
       $services=department::where('id_user',auth()->user()->id)->get();
        return view('pre-appointment',compact('services','parameter'));
    }
    public function appointmentAdd(Request $request)

    {         $validateData=$request->validate([
        'name' => ['required', 'string', 'max:255' ,'min:2'],
        'email' => ['required', 'string', 'email', 'max:255'],
        'phone' => ['required', 'integer','min:1000000000','max:99999999999'],
        'purpose' => ['required', 'string', 'max:1500','min:4'],
      ]);
       $event= Event::where('start', '<=', $request->input('start'))
        ->where('end', '>=', $request->input('end'))->first();
        if($event->state=="open time"){
        $visitorlimit= visitor::where('id_event',$event->id)->count();
            if($visitorlimit> $event->limit_of_attendees){
                Alert::error('Error!','this service has a limited attendees !sorry to inform you that all the places are filled');       
                return redirect()->back();
                
            }else{
         
      $errors = array();
      $uniques = array();
      for($i = 0; $i < 500; ++$i)
      {
      $random_code = mt_rand(10000, 99999);
      if(!in_array($random_code, $uniques))
      {
          $uniques[] = $random_code;
  
      }  
      }        $first=$uniques[1];
  
      $file = '/images/qrcode'.$first.'.png';
      $Qrcode= \QrCode::size(500)
      ->format('png')
      ->generate(($first), public_path('images/qrcode'.$first.'.png'));
      $email=$request->get('email');
      if(Visitor::where('id_user',auth()->user()->id)->where('email', '=', $request->get('email'))->where('phone', '=', $request->get('phone'))->exists()){
       $visitor= Visitor::where('id_user',auth()->user()->id)->where('email',$email)->first()->update(['frequentlyVisted' => DB::raw('frequentlyVisted + 1')]);
      }
      if($request->get('field1'))
      {$field1=$request->get('field1');}else{$field1='';}
      if($request->get('field2'))
      { $field2=$request->get('field2');}else{$field2='';}
      if($request->get('field1'))
      {$field3=$request->get('field3');}else{$field3='';}
      $visitor  = new Visitor([
        'name' => $request->get('name'),
        'phone' => $request->get('phone'),
        'email' => $request->get('email'),
        'purpose' => $request->get('purpose'),
       'frequentlyVisted'=> '1',
       'id_user'=>$request->get('id_user'),
       'field1'=> $field1,
       'field2'=> $field2,
       'field3'=> $field3,
       'id_service' => $request->get('service'),
       'checkin_date' => $request->input('start'),
       'code'=>$first,
       'Qrcode' =>$file,
        'id_event'=>$event->id,

    ]); 
  $visitor->save(); 
      $visit  = new Visit([
        'name' => $request->get('name'),
        'phone' => $request->get('phone'),
        'email' => $request->get('email'),
        'purpose' => $request->get('purpose'),
        'visitor_visit_image'=> $request->get('visitor_image'),
        'field1'=> $field1,
        'field2'=> $field2,
        'field3'=> $field3,
         'Qrcode' =>$file,
         'code'=>$first,
            'type'=>'pre_appointment',
       'id_user'=>$request->get('id_user'),
       'checkin_date' =>$request->input('start'),


    ]); 
  $visit->save();

  $data=[
    'name'=> $request->get('name'),
    'Qrcode'=> $file,
    'email' => $request->get('email')
  ];
  Mail::to($request->get('email'))->send(new codeEmail($data));

      Alert::success('Success','Appointment is saved Successfully');
      return redirect()->back();}}elseif(!($event->state=="open time")){
                   $service=Service::where('id_department',$request->get('service'))->first();


        
                    $available=  availability::where('event_id',$event->id)->where('id_department',$request->get('service'))->get()->all();

                    $diff = null;
                    $index = null;

                    foreach($available as $av)
                    {   $available_dates=$av->hours;
                       $timestamp=$request->input('start');
                        $currDiff = abs(strtotime($timestamp) - strtotime($available_dates));
                        if (is_null($diff) || $currDiff < $diff) {
                            $index = $av->id;
                            $diff = $currDiff;

                        }                        
                    }                      

                    $av=availability::where('id',$index)->where('state','not taken')->first();   
                    if(!empty($av)){   
                        availability::where('id',$index)->update(['state'=>'taken']);
                        $checkin=$av->hours;
                        
      $errors = array();
      $uniques = array();
      for($i = 0; $i < 500; ++$i)
      {
      $random_code = mt_rand(10000, 99999);
      if(!in_array($random_code, $uniques))
      {
          $uniques[] = $random_code;
  
      }  
      }        $first=$uniques[1];
  
      $file = '/images/qrcode'.$first.'.png';
      $Qrcode= \QrCode::size(500)
      ->format('png')
      ->generate(($first), public_path('images/qrcode'.$first.'.png'));
      $email=$request->get('email');
      if(Visitor::where('id_user',auth()->user()->id)->where('email', '=', $request->get('email'))->where('phone', '=', $request->get('phone'))->exists()){
       $visitor= Visitor::where('id_user',auth()->user()->id)->where('email',$email)->first()->update(['frequentlyVisted' => DB::raw('frequentlyVisted + 1')]);
      }
      if($request->get('field1'))
          {$field1=$request->get('field1');}else{$field1='';}
          if($request->get('field2'))
          { $field2=$request->get('field2');}else{$field2='';}
          if($request->get('field1'))
          {$field3=$request->get('field3');}else{$field3='';}
          $visitor  = new Visitor([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'purpose' => $request->get('purpose'),
           'frequentlyVisted'=> '1',
           'id_user'=>$request->get('id_user'),
           'field1'=> $field1,
           'field2'=> $field2,
           'field3'=> $field3,
           'id_service' => $request->get('service'),
           'checkin_date' => $checkin,
           'Qrcode' =>$file,
           'code'=>$first,
           'type'=>'pre_appointment',




        ]); 
      $visitor->save(); 
      $visit  = new Visit([
        'name' => $request->get('name'),
        'phone' => $request->get('phone'),
        'email' => $request->get('email'),
        'purpose' => $request->get('purpose'),
        'visitor_visit_image'=> $request->get('visitor_image'),
        'field1'=> $field1,
        'field2'=> $field2,
        'field3'=> $field3,
         'Qrcode' =>$file,
       'id_user'=>$request->get('id_user'),
       'checkin_date' => $checkin,

    ]); 
  $visit->save();
  $data=[
    'name'=> $request->get('name'),
    'Qrcode'=> $file,
    'email' => $request->get('email')
  ];
  Mail::to($request->get('email'))->send(new codeEmail($data));



                        Alert::success('Success','Appointment is saved Successfully you"ll receive an email soon');
                        return redirect()->back();}else{
                          
                            Alert::error('Error','this date is taken try another date');
                            return redirect()->back();
                        }
                
      }
    }
    public function ServiceAdd(Request $request)
    { if(isset($request->title)){
        $department=Department::create([
            'title'=>$request->title,
            'id_user'=>auth()->user()->id,
        ]);
        $department->save();
        Alert::success('Success','Service is added Successfully');
        return redirect()->back();
    }else{
        Alert::error('Error','Please enter a Service');
        return redirect()->back();

    }
    }
    public function close()
    {
       return redirect()->back();
    }
    public function evacuation(){
        $user = auth()->user();

        $present_visitors_number = Visitor::where('id_user',$user->id)->where('checkout_date',NULL)->count();
        $visitors = Visitor::where('id_user',$user->id)->where('checkout_date',NULL)->get()->all();
        return view('evacuation',compact('visitors','present_visitors_number'));
    }
    public function pre_appointment_checkin(){
        $user = auth()->user();
     
    
            $parameter = parameter::where('id_user',$user->id)->first();
            return view('pre_appointment_checkin',compact('parameter'));

    }
    public function pre_appointment_checkin_add(Request $request){
        $user = auth()->user();
        $id=$request->get('id_vistor');
        $visitors = Visitor::where('id_user',$user->id)->where('id',$id)->update(['visitor_image',$request->get('visitor_image')]);
        $visitors = Visitor::where('id_user',$user->id)->where('id',$id)->first();

        return view('check-in-succes',compact('visitor','parameter'));    }
}
