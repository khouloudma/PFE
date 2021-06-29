<?php

namespace App\Http\Controllers;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Event;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {$id_user=auth()->user()->id;
        $event=Event::where('id_user',$id_user)->Latest()->get();
        return response()->json($event,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $id_user=auth()->user()->id;
        try{
        $validator=Validator::make($request->all(),[
            'title'=>'required',
            'start'=>'required',
            'end'=>'required',
            'AllDay'=>'required',
            'color'=>'required',
            'textColor'=>'required',
            'state'=>'required',


        ]);
        if($validator->failed()){
            Alert::error('Error!',$validator->messages()-first());       
            return redirect()->back();
 
        }else{
            if(empty($request->event_id)){

                    Event::create([
                        'title'=>$request->title,
                        'start'=>$request->start,
                        'end'=>$request->end,
                        'AllDay'=>$request->AllDay,
                        'color'=>$request->color,
                        'textColor'=>$request->textColor,
                        'id_user'=>$id_user,
                        'state'=>$request->state,
                        'limit_of_attendees'=>$request->limit_of_attendees,

            
                    ]);
                    Alert::success('Success','Service Created Successfully');
                    return redirect()->back();
                    
            }else{
                        Event::where('id_user',$id_user)->where('id',$request->event_id)->update([
                            'title'=>$request->title,
                            'start'=>$request->start,
                            'end'=>$request->end,
                            'AllDay'=>$request->AllDay,
                            'color'=>$request->color,
                            'textColor'=>$request->textColor,
                            'state'=>$request->state,
                            'limit_of_attendees'=>$request->limit_of_attendees,


                
                        ]);
                        Alert::success('Success','Service Updated Successfully');
                        return redirect()->back();
            }
        }

        }catch(\Exception $e){
                Alert::error('Error',$e->getMessage());
                return redirect()->back();

          }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    
    { 
        try{
            Event::where('id',$id)->delete();
            Alert::success('Success','Service deleted Successfully');
            return redirect()->back();
    }catch(\Exception $e){
        Alert::error('Error',$e->getMessage());
        return redirect()->back();

  }
    }
}
