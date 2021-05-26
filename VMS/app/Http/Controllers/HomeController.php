<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\visitor;
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
        return view('home');
    }
    public function profile()
    {
        return view('profile');
    }
    public function visitor()
    {
        $visitor = Visitor::where('checkout_date',NULL)->get();
        return view('visitorLog',compact('visitor'));
      
    }
    public function history()
    {
        $visitor = Visitor::whereNotNull('checkout_date')->get();
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

            return view('checkout_success',compact('visitor'));
            
        }elseif(empty($visitor)){
            Session::flash('failure', 'the code entred is incorrect !!');
            return view('checkout');};
    }
    public function checkinsucess()
    {
        return view('check-in-succes');
    }
}
