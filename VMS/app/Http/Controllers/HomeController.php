<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\visitor;
use App\visit;
use App\User;
use Session;
use App\Feedback;
use App\parameter;
use DB;




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
    {   $user = auth()->user();
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
        $visit = Visit::where('id_user',$user->id)->whereNotNull('checkout_date')->get();
        $parameter = parameter::where('id_user',$user->id)->first();
        return view('history',compact('visit','parameter'));
      
    }
    public function checkin()
    {
        
        $user = auth()->user();
        $parameter = parameter::where('id_user',$user->id)->first();
        return view('checkin',compact('parameter'));
    }
       public function checkout()
    {
        $visitor = Visitor::get();
        return view('checkout',compact('visitor'));
    }
    public function checkoutsuccess(Request $request){
        $validateData=$request->validate([
            'code' => ['required', 'integer', 'max:99999' ,'min:10000'],
          ]);
          $code=$request->get('code');

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

      return view('forms',compact('parameter'));
    }
}
