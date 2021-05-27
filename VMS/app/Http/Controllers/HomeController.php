<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\visitor;
use App\User;
use Session;


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
        $user = User::all();

        return view('home',compact('user'));
    }
    public function profile()
    {
        return view('profile');
    }
    public function visitor()
    {   $user = auth()->user();
        $visitor = Visitor::where('id_user',$user->id)->where('checkout_date',NULL)->get();
        return view('visitorLog',compact('visitor'));
      
    }
    public function history()
    {
        $user = auth()->user();
        $visitor = Visitor::where('id_user',$user->id)->whereNotNull('checkout_date')->get();
        return view('history',compact('visitor'));
      
    }
    public function checkin()
    {
        return view('checkin');
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
}
