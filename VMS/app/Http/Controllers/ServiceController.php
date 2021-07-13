<?php

namespace App\Http\Controllers;
use App\Department;
use App\Event;
use Alert;
use Carbon\Carbon;
use App\Visitor;
use App\availability;


use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

  

    public function ServiceConfigure(Request $request){
        if(isset($request->start) && isset($request->end) && isset($request->recurrence) && isset($request->breaktime) && isset($request->state)){
        $id_user=auth()->user()->id;
        
        $title_dep=Department::where('id',$request->id_department)->first()->title;

        $service=Service::create([
            'title'=>$title_dep,
            'start'=>$request->start,
            'end'=>$request->end,
            'breaktime'=>$request->breaktime,
            'start_break'=>$request->start_break,
            'end_break'=>$request->end_break,
            'recurrence'=>$request->recurrence,
            'color'=>$request->color,
            'textColor'=>$request->textColor,
            'id_user'=>$id_user,
            'id_department'=>$request->id_department,
            'state'=>$request->state,
            'limit_of_attendees'=>$request->limit_of_attendees,
        ]);

        $service->save();
        if($service->recurrence=='Daily'){
            $event= Event::create([
                'title'=>$title_dep,
                'start'=>$request->start,
                'end'=>$request->end,
                'AllDay'=>$request->AllDay,
                'recurrence'=>$request->recurrence,
                'color'=>$request->color,
                'textColor'=>$request->textColor,
                'id_user'=>$id_user,
                'service_id'=>$service->id,
                'state'=>$request->state,
                'limit_of_attendees'=>$request->limit_of_attendees,
                'breaktime'=>$request->breaktime,
                'start_break'=>$request->start_break,
                'end_break'=>$request->end_break,

            ]);
            $service->event()->save($event);
//create available all//
           if(!($event->state=="open time")){
            $start=Carbon::parse($event->start)->format('H:i:s');
            $end=Carbon::parse($event->end)->format('H:i:s');
            $tt=Carbon::parse($event->state)->format('H:i:s');
            $secs = strtotime($tt)-strtotime("00:00:00");
            $date = Carbon::parse($event->start)->format("Y-m-d");
            $result=$start;
            $availability=availability::create([
                'id_service'=>$event->service_id,
                'id_user'=>$event->id_user,
                'state'=>"not taken",
                'hours'=>$event->start,
                'id_department'=>$event->service_id,
                'event_id'=>$event->id,
                'id_visitor'=>"1",
                ]);
                $event->availability()->save($availability);
            do{
                $result=date("H:i:s",strtotime($result)+$secs);
                
                $datestamp = date('Y-m-d H:i:s', strtotime("$date $result"));

                $availability=availability::create([
                'id_service'=>$event->service_id,
                'id_user'=>$event->id_user,
                'state'=>"not taken",
                'id_department'=>$event->service_id,
                'event_id'=>$event->id,
                'id_visitor'=>"1",
                'hours'=>$datestamp,

                    ]);
            $event->availability()->save($availability);
            }while($result < $end);
//end of creating them all//
//deleting availbilities in break//
            if($event->breaktime=="Partial")
            {
                $break_start=Carbon::parse($event->start_break)->format('H:i:s');
            
            $break_end=Carbon::parse($event->end_break)->format('H:i:s');
            $timeline=$break_start;
            $timestart = date('Y-m-d H:i:s', strtotime("$date $break_start"));
            availability::where('event_id',$event->id)->where('hours',$timestart)->delete();
            $result=$break_start;

        do{
            $result=date("H:i:s",strtotime($result)+$secs);
            
            $datestamp = date('Y-m-d H:i:s', strtotime("$date $result"));

           availability::where('event_id',$event->id)->where('hours',$datestamp)->delete();

            }while($result < $break_end);

            }}//if not open closeif
            //end of deleting//
        

        }elseif($service->recurrence=='Weekly'){
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
            'title'=>$title_dep,
            'start'=>$request->start,
            'end'=>$request->end,
            'AllDay'=>$request->AllDay,
            'recurrence'=>$request->recurrence,
            'color'=>$request->color,
            'textColor'=>$request->textColor,
            'id_user'=>$id_user,
            'service_id'=>$service->id,
            'state'=>$request->state,
            'limit_of_attendees'=>$request->limit_of_attendees,
            'breaktime'=>$request->breaktime,
            'start_break'=>$request->start_break,
            'end_break'=>$request->end_break,

        ]);
        $service->event()->save($event1);
       if(!($event1->state=="open time")){
        $start=Carbon::parse($event1->start)->format('H:i:s');
        $end=Carbon::parse($event1->end)->format('H:i:s');
        $tt=Carbon::parse($event1->state)->format('H:i:s');
        $secs = strtotime($tt)-strtotime("00:00:00");
        $date = Carbon::parse($event1->start)->format("Y-m-d");
        $result=$start;
       $availability=Availability::create([
            'id_service'=>$event1->service_id,
            'id_user'=>$event1->id_user,
            'state'=>"not taken",
            'hours'=>$event1->start,
            'id_department'=>$request->id_department,
            'event_id'=>$event1->id,
            'id_visitor'=>"1",
            ]);
            $event1->availability()->save($availability);

        do{
            $result=date("H:i:s",strtotime($result)+$secs);
            
            $datestamp = date('Y-m-d H:i:s', strtotime("$date $result"));
          $availability= Availability::create([
                'id_service'=>$event1->service_id,
            'id_user'=>$event1->id_user,
            'state'=>"not taken",
            'id_department'=>$request->id_department,
            'event_id'=>$event1->id,
                'hours'=>$datestamp,
                'id_visitor'=>"1",

                ]);                $event1->availability()->save($availability);

        }while($result < $end);
        if($event1->breaktime=="Partial")
        {
            $break_start=Carbon::parse($event1->start_break)->format('H:i:s');
        
        $break_end=Carbon::parse($event1->end_break)->format('H:i:s');
        $timestart = date('Y-m-d H:i:s', strtotime("$date $break_start"));
        availability::where('event_id',$event1->id)->where('hours',$timestart)->delete();
     
        $result=$break_start;
        do{
        $result=date("H:i:s",strtotime($result)+$secs);
        
        $datestamp = date('Y-m-d H:i:s', strtotime("$date $result"));
       Availability::where('hours',$datestamp)->delete();

        }while($result < $break_end);
        
        }
}                   
       $event2= Event::create([
        'title'=>$title_dep,
        'start'=>$finalresultstart,
        'end'=>$finalresultend,
        'AllDay'=>$request->AllDay,
        'recurrence'=>$request->recurrence,
        'color'=>$request->color,
        'textColor'=>$request->textColor,
        'id_user'=>$id_user,
        'service_id'=>$service->id,
        'state'=>$request->state,
        'limit_of_attendees'=>$request->limit_of_attendees,
        'breaktime'=>$request->breaktime,
        'start_break'=>$request->start_break,
        'end_break'=>$request->end_break,

    ]);
    $service->event()->save($event2);

   if(!($event2->state=="open time")){
    $start=Carbon::parse($event2->start)->format('H:i:s');
    $end=Carbon::parse($event2->end)->format('H:i:s');
    $tt=Carbon::parse($event2->state)->format('H:i:s');
    $secs = strtotime($tt)-strtotime("00:00:00");
    $date = Carbon::parse($event2->start)->format("Y-m-d");
    $result=$start;
    $availability=Availability::create([
        'id_service'=>$event2->service_id,
        'id_user'=>$event2->id_user,
        'state'=>"not taken",
        'hours'=>$event2->start,
        'id_department'=>$request->id_department,
        'event_id'=>$event2->id,
        'id_visitor'=>"1",
        ]);
        $event2->availability()->save($availability);


    do{
        $result=date("H:i:s",strtotime($result)+$secs);
        
        $datestamp = date('Y-m-d H:i:s', strtotime("$date $result"));
        $availability=Availability::create([
        'id_service'=>$event2->service_id,
        'id_user'=>$event2->id_user,
        'state'=>"not taken",
        'id_department'=>$request->id_department,
        'event_id'=>$event2->id,
        'hours'=>$datestamp,
        'id_visitor'=>"1",
            ]);
        $event2->availability()->save($availability);

            
    }while($result < $end);
    if($event2->breaktime=="Partial")
    {
    $break_start=Carbon::parse($event2->start_break)->format('H:i:s');    
    $break_end=Carbon::parse($event2->end_break)->format('H:i:s');
    $timestart = date('Y-m-d H:i:s', strtotime("$date $break_start"));
    availability::where('event_id',$event2->id)->where('hours',$timestart)->delete();
    $result=$break_start;
do{
    $result=date("H:i:s",strtotime($result)+$secs);
    
    $datestamp = date('Y-m-d H:i:s', strtotime("$date $result"));
  Availability::where('hours',$datestamp)->delete();

    }while($result < $break_end);
    
    }
}

   $event3= Event::create([
    'title'=>$title_dep,
    'start'=>$finalresultstart1,
    'end'=>$finalresultend1,
    'AllDay'=>$request->AllDay,
    'recurrence'=>$request->recurrence,
    'color'=>$request->color,
    'textColor'=>$request->textColor,
    'id_user'=>$id_user,
    'service_id'=>$service->id,
    'state'=>$request->state,
    'limit_of_attendees'=>$request->limit_of_attendees,
    'breaktime'=>$request->breaktime,
    'start_break'=>$request->start_break,
    'end_break'=>$request->end_break,

]);
$service->event()->save($event3);
if(!($event3->state=="open time")){
    $start=Carbon::parse($event3->start)->format('H:i:s');
    $end=Carbon::parse($event3->end)->format('H:i:s');
    $tt=Carbon::parse($event3->state)->format('H:i:s');
    $secs = strtotime($tt)-strtotime("00:00:00");
    $date = Carbon::parse($event3->start)->format("Y-m-d");
    $result=$start;
  $availability= Availability::create([
        'id_service'=>$event3->service_id,
        'id_user'=>$event3->id_user,
        'state'=>"not taken",
        'hours'=>$event3->start,
        'id_department'=>$request->id_department,
        'event_id'=>$event3->id,
        'id_visitor'=>"1",
        ]);
        $event3->availability()->save($availability);

       

    do{
        $result=date("H:i:s",strtotime($result)+$secs);
        
        $datestamp = date('Y-m-d H:i:s', strtotime("$date $result"));
        $availability=Availability::create([
            'id_service'=>$event3->service_id,
        'id_user'=>$event3->id_user,
        'state'=>"not taken",
        'id_department'=>$request->id_department,
        'event_id'=>$event3->id,
            'hours'=>$datestamp,
            'id_visitor'=>"1",
            ]);
            $event3->availability()->save($availability);

    }while($result < $end);
    if($event3->breaktime=="Partial")
    {
        $break_start=Carbon::parse($event3->start_break)->format('H:i:s');
    
    $break_end=Carbon::parse($event3->end_break)->format('H:i:s');
    $timestart = date('Y-m-d H:i:s', strtotime("$date $break_start"));
    availability::where('event_id',$event3->id)->where('hours',$timestart)->delete();
    $result=$break_start;
    do{
    $result=date("H:i:s",strtotime($result)+$secs);
    
    $datestamp = date('Y-m-d H:i:s', strtotime("$date $result"));
    Availability::where('hours',$datestamp)->delete();

    }while($result < $break_end);
    
    }
}

$event4= Event::create([
'title'=>$title_dep,
'start'=>$finalresultstart2,
'end'=>$finalresultend2,
'AllDay'=>$request->AllDay,
'recurrence'=>$request->recurrence,
'color'=>$request->color,
'textColor'=>$request->textColor,
'id_user'=>$id_user,
'service_id'=>$service->id,
'state'=>$request->state,
'limit_of_attendees'=>$request->limit_of_attendees,
'breaktime'=>$request->breaktime,
'start_break'=>$request->start_break,
'end_break'=>$request->end_break,

]);
$service->event()->save($event4);
if(!($event4->state=="open time")){
    $start=Carbon::parse($event4->start)->format('H:i:s');
    $end=Carbon::parse($event4->end)->format('H:i:s');
    $tt=Carbon::parse($event4->state)->format('H:i:s');
    $secs = strtotime($tt)-strtotime("00:00:00");
    $date = Carbon::parse($event4->start)->format("Y-m-d");
    $result=$start;
   $availability=Availability::create([
        'id_service'=>$event4->service_id,
        'id_user'=>$event4->id_user,
        'state'=>"not taken",
        'hours'=>$event4->start,
        'id_department'=>$request->id_department,
        'event_id'=>$event4->id,
        'id_visitor'=>"1",
        ]);
        $event4->availability()->save($availability);


    do{
        $result=date("H:i:s",strtotime($result)+$secs);
        
        $datestamp = date('Y-m-d H:i:s', strtotime("$date $result"));
       $availability= Availability::create([
            'id_service'=>$event4->service_id,
        'id_user'=>$event4->id_user,
        'state'=>"not taken",
        'id_department'=>$request->id_department,
        'event_id'=>$event4->id,
            'hours'=>$datestamp,
            'id_visitor'=>"1",
            ]);
            $event4->availability()->save($availability);

    }while($result < $end);
    if($event4->breaktime=="Partial")
    {
        $break_start=Carbon::parse($event4->start_break)->format('H:i:s');
    
    $break_end=Carbon::parse($event4->end_break)->format('H:i:s');
    $timestart = date('Y-m-d H:i:s', strtotime("$date $break_start"));
    Availability::where('event_id',$event4->id)->where('hours',$timestart)->delete();
    $result=$break_start;
do{
    $result=date("H:i:s",strtotime($result)+$secs);
    
    $datestamp = date('Y-m-d H:i:s', strtotime("$date $result"));
    Availability::where('hours',$datestamp)->delete();

    }while($result < $break_end);
    
    }
}


      

return "is it weekly";   }return "Service saved";

}
return "fill-in the appropriate fields";
   }

   public function DeleteDepartment($id){

$nbre_service=Service::where('id_department',$id)->count();

$list=Service::where('id_department',$id)->pluck('id');
for ($x = 0; $x < $nbre_service ; $x++) {
   $id_service=Service::where('id',$list[$x])->first()->id;
    $nbre_event=Event::where('service_id',$id_service)->count();
    $list_event=Event::where('service_id',$id_service)->pluck('id');
    for ($k = 0; $k< $nbre_event ; $k++) {
        Event::where('id',$list_event[$k])->delete();

    }
    Service::where('id',$list[$x])->delete();
}
return 'done ?';
$nbre_av=Availability::where('id_department',$id)->count();$s=0;

 Availability::where('id_department',$id)->pluck('id');
 for ($x = 0; $x < $nbre_av ; $x++) {

    Availability::where('id',$list[$x])->delete();
}

Department::where('id',$id)->delete();
        return redirect()->back();
   }
}
