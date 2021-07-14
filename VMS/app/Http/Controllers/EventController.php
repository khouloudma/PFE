<?php

namespace App\Http\Controllers;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Event;
use App\Service;
use Carbon\Carbon;

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
    
        $validator=Validator::make($request->all(),[
            'title'=>'required',
            'start'=>'required',
            'end'=>'required',
            'recurrence'=>'required',
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
            
                    $service=Service::create([
                        'title'=>$request->title,
                        'start'=>$request->start,
                        'end'=>$request->end,
                        'breaktime'=>$request->breaktime,
                        'start_break'=>$request->start_break,
                        'end_break'=>$request->end_break,
                        'recurrence'=>$request->recurrence,
                        'color'=>$request->color,
                        'textColor'=>$request->textColor,
                        'id_user'=>$id_user,
                        'state'=>$request->state,
                        'limit_of_attendees'=>$request->limit_of_attendees,

            
                    ]);
                    $service->save();
                    if($service->recurrence=='Weekly')
                    {
                        $start=Carbon::parse($service->start)->format("Y-m-d");
                        $end=Carbon::parse($service->end)->format("Y-m-d");
                        $resultend=date("Y-m-d",strtotime($end. ' + 7 days'));
                        $resultend1=date("Y-m-d",strtotime($end. ' + 14 days'));
                        $resultend2=date("Y-m-d",strtotime($end. ' + 21 days'));
                        $resultend3=date("Y-m-d",strtotime($end. ' + 28 days'));

                        $endhours=Carbon::parse($service->end)->format("H:i:s");

                        $finalresultend=date('Y-m-d H:i:s', strtotime("$resultend $endhours"));
                        $finalresultend1=date('Y-m-d H:i:s', strtotime("$resultend1 $endhours"));
                        $finalresultend2=date('Y-m-d H:i:s', strtotime("$resultend2 $endhours"));
                        $finalresultend3=date('Y-m-d H:i:s', strtotime("$resultend3 $endhours"));

                        $resultstart=date("Y-m-d",strtotime($start. ' + 7 days'));
                        $resultstart1=date("Y-m-d",strtotime($start. ' + 14 days'));
                        $resultstart2=date("Y-m-d",strtotime($start. ' + 21 days'));
                        $resultstart3=date("Y-m-d",strtotime($start. ' + 28 days'));

                        $starthours=Carbon::parse($service->start)->format("H:i:s");
                        $finalresultstart=date('Y-m-d H:i:s', strtotime("$resultstart $starthours"));
                        $finalresultstart1=date('Y-m-d H:i:s', strtotime("$resultstart1 $starthours"));
                        $finalresultstart2=date('Y-m-d H:i:s', strtotime("$resultstart2 $starthours"));
                        $finalresultstart3=date('Y-m-d H:i:s', strtotime("$resultstart3 $starthours"));


                   $event1= Event::create([
                        'title'=>$request->title,
                        'start'=>$request->start,
                        'end'=>$request->end,
                        'AllDay'=>$request->AllDay,
                        'recurrence'=>$request->recurrence,
                        'color'=>$request->color,
                        'textColor'=>$request->textColor,
                        'id_user'=>$id_user,
                        'id_service'=>$service->id,
                        'state'=>$request->state,
                        'limit_of_attendees'=>$request->limit_of_attendees,
                        'breaktime'=>$request->breaktime,
                        'start_break'=>$request->start_break,
                        'end_break'=>$request->end_break,

                    ]);
                   $event1->save();                      
                   $event2= Event::create([
                    'title'=>$request->title,
                    'start'=>$finalresultstart,
                    'end'=>$finalresultend,
                    'AllDay'=>$request->AllDay,
                    'recurrence'=>$request->recurrence,
                    'color'=>$request->color,
                    'textColor'=>$request->textColor,
                    'id_user'=>$id_user,
                    'id_service'=>$service->id,
                    'state'=>$request->state,
                    'limit_of_attendees'=>$request->limit_of_attendees,
                    'breaktime'=>$request->breaktime,
                    'start_break'=>$request->start_break,
                    'end_break'=>$request->end_break,

                ]);
               $event2->save();
               $event3= Event::create([
                'title'=>$request->title,
                'start'=>$finalresultstart1,
                'end'=>$finalresultend1,
                'AllDay'=>$request->AllDay,
                'recurrence'=>$request->recurrence,
                'color'=>$request->color,
                'textColor'=>$request->textColor,
                'id_user'=>$id_user,
                'id_service'=>$service->id,
                'state'=>$request->state,
                'limit_of_attendees'=>$request->limit_of_attendees,
                'breaktime'=>$request->breaktime,
                'start_break'=>$request->start_break,
                'end_break'=>$request->end_break,

            ]);
           $event3->save();
           $event4= Event::create([
            'title'=>$request->title,
            'start'=>$finalresultstart2,
            'end'=>$finalresultend2,
            'AllDay'=>$request->AllDay,
            'recurrence'=>$request->recurrence,
            'color'=>$request->color,
            'textColor'=>$request->textColor,
            'id_user'=>$id_user,
            'id_service'=>$service->id,
            'state'=>$request->state,
            'limit_of_attendees'=>$request->limit_of_attendees,
            'breaktime'=>$request->breaktime,
            'start_break'=>$request->start_break,
            'end_break'=>$request->end_break,

        ]);
       $event4->save();
       $event5= Event::create([
        'title'=>$request->title,
        'start'=>$finalresultstart3,
        'end'=>$finalresultend3,
        'AllDay'=>$request->AllDay,
        'recurrence'=>$request->recurrence,
        'color'=>$request->color,
        'textColor'=>$request->textColor,
        'id_user'=>$id_user,
        'id_service'=>$service->id,
        'state'=>$request->state,
        'limit_of_attendees'=>$request->limit_of_attendees,
        'breaktime'=>$request->breaktime,
        'start_break'=>$request->start_break,
        'end_break'=>$request->end_break,

    ]);
   $event5->save();
                                      



                    Alert::success('Success','Weekly service Created Successfully');
                    return redirect()->back();
}else{

    $event1= Event::create([
        'title'=>$request->title,
        'start'=>$request->start,
        'end'=>$request->end,
        'AllDay'=>$request->AllDay,
        'recurrence'=>$request->recurrence,
        'color'=>$request->color,
        'textColor'=>$request->textColor,
        'id_user'=>$id_user,
        'id_service'=>$service->id,
        'state'=>$request->state,
        'limit_of_attendees'=>$request->limit_of_attendees,
        'breaktime'=>$request->breaktime,
        'start_break'=>$request->start_break,
        'end_break'=>$request->end_break,

    ]);
   $event1->save();        
   Alert::success('Success','Daily service Created Successfully');
   return redirect()->back();
}
            }
        

    
    }}

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
