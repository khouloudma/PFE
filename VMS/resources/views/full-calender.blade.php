<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
Calender  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->  


  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files --><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <style>
  .btn.slider-btn, .btn_0, .btn_10, .pricing-card-area .single-card .card-bottom .get-btn {
    background: #ff4495;
    background: -moz-linear-gradient(top, #ff4495 0%, #ff6d6d 100%, #7db9e8 100%);
    background: -webkit-linear-gradient(top, #ff4495 0%, #ff6d6d 100%, #7db9e8 100%);
    background: linear-gradient(to bottom, #ff4495 0%, #ff6d6d 100%, #7db9e8 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff4495', endColorstr='#7db9e8', GradientType=0);
}.btn_0 {
    border: none;
    padding: 11px 36px !important;
    text-transform: capitalize !important;
    color: #fff !important;
    font-size: 18px !important;
    font-weight: 500 !important;
    display: inline-block !important;
    cursor: pointer;
    display: inline-block;
    border-radius: 25px;
    -webkit-transition: all .5s ease-out 0s;
    -moz-transition: all .5s ease-out 0s;
    -ms-transition: all .5s ease-out 0s;
    -o-transition: all .5s ease-out 0s;
    transition: all .5s ease-out 0s;
}
a, button {
    color: #fff;
    outline: medium none;
}</style>

  <!-- CSS Just for demo purpose, don't include it in your project -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
  <!--   Core JS Files   -->
  
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/jquery.timepicker.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
  <script src="{{  URL::asset('js/fullcalendar.js') }}"></script>
  <link href="../css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">
<link href="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/css/bootstrap-timepicker.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/bootstrap.timepicker/0.2.6/js/bootstrap-timepicker.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
    #dialog{
      display:none;
    }
  </style>
  <script>
  $(document).ready(function() {
        $('#list').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;
 
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };
 
                // Total over all pages
                total = api
                    .column( 3 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
 
                // Total over this page
                pageTotal = api
                    .column( 3, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
 
                // Update footer
                $( api.column( 3 ).footer() ).html(
                  ' ₱'+pageTotal // +' ( ₱'+ total + ')' ouput the total of all pages //
                );
            }
        } );
    } );</script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/fullcalendar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.timepicker.css') }}" />

</head>

<body class="">
  <div class="wrapper ">
  <div class="sidebar" data-color="white" style="  width:261px;
background-image: url('/assets/img/test.jpg')"> 
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a  class="simple-text logo-normal">
Calendar        </a></div>
      <div class="sidebar-wrapper">
      <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="home">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" href="visitor">
              <i class="material-icons">person</i>
              <p>Visitor log</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="checkin">
              <i class="material-icons">content_paste</i>
              <p>Web check in</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="checkout">
              <i class="material-icons">library_books</i>
              <p>Web check out</p>
            </a>
          </li>
          <li class="nav-item active" style="    width: 189px;">
            <a class="nav-link" href="./icons.html">
              <i class="material-icons">bubble_chart</i>
              <p>Event calandar</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./map.html">
              <i class="material-icons">location_ons</i>
              <p>Invitees</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./notifications.html">
              <i class="material-icons">notifications</i>
              <p>Notifications</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./rtl.html">
              <i class="material-icons">language</i>
              <p>Evacuation</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="">
            <i class="material-icons">person</i>
              <p>Customized Forms</p>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" href="./">
            <i class="material-icons">language</i>
              <p>Customized messages</p>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" href="">
            <i class="material-icons">notifications</i>
              <p>Help</p>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" href="/history">
            <i class="material-icons">notifications</i>
              <p>History</p>
            </a>
          </li>
          <li class="nav-item  ">
            <a class="nav-link" href="profile">
            <i class="material-icons">library_books</i>
              <p>Profile</p>
            </a>
          </li>
          <li class="nav-item  ">
          <form  id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf</form>

            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons">library_books</i> <p> {{ __('Logout') }}</p></a>           
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Services</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
      
              <div class="input-group no-border">
                  <div class="ripple-container"></div>
              </div>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i><a> {{ auth()->user()->name }}</a>

                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><form  id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf</form><p> {{ __('Logout') }}</p></a>  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <br><br><br>
      <div class="card"style="    background: #eeeeee;">
          <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Your Services Calendar </h4>
                  <p class="card-category">Plan your services</p>
      </div> </div><br>
   
      <div>
        <form action="/ServiceAdd" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="align-baseline"> 
            <input type="text" id="title"class="form-control" style="width:fit-content; margin-left:30px;" name="title" placeholder="Service Title">
            <button class='btn btn-success' type="submit" style="margin-left: 205px;margin-top: -54px;"id="add">Add service</button>
        </div>
        </form>
        </div>   <center>
        <!---service adding------------>
        <table  id='list' name="list" class="table">
          <thead style="    background:linear-gradient(to bottom, #171717fc 0%, #191919b3 100%, #ffffff3d 100%);
    color: white;height: 52px;">
            <td>Service:</td>
            <td>Action:</td>
          </thead>
          <tbody>
          @foreach($services as $ser)
          <tr style="background-color:#5a56561f;">
          <td style=" font-size:40px"><center>{{$ser->title}}</center></td>
          <td style="    width: 244px;">

            <button class="btn btn-outline-primary btn-floating" id='addEventButton'  onclick="openchoices(<?php echo $ser->id;?>)"><i class="fa fa-magic"></i></button>
          <form action="/remove_department/{{$ser->id}}" method="POST">
                              {{ method_field('POST') }}
                              @csrf
                               <input type="hidden" name="_method" value="POST">      
                                <button type="submit" class="btn btn-danger"    onclick="return confirm('Êtes-vous sûrs ?')"  style="margin-left: 107px;margin-top: -76px;"><i class="fa fa-remove" ></i></button></form>          </tr>
          <script>function openchoices(idwd) {
                  var x = document.getElementById("K"+idwd);
                 if (    x.style.display == "block") {
                 x.style.display = "none";} else {x.style.display = "block";}};
              </script>
          @endforeach
          </tbody>
        </table>
       <br><br>
         <!---service table------------>
      <div class="content">    
        <div class="container">
          <div id="calendar"></div></div></div></div>

   
     

      <!-- event dialog start -->
      @foreach($services as $ser)
      <div id="K<?php echo $ser->id;?>" class="modal" style="overflow: auto;">
    
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title">Service configuration</h5>
    

     
        </div>
      <div class="modal-body">
            <div class="form-group">
            <!--     <label for="title">Service title:department->title</label>
                <input type="text" hidden="true" value="department->id"> 
                <input type="text" hidden="true" value="department->title"> 

                -->

                    <script>
   function breaktimeM(idwd) {
      var val= document.getElementById("breaktime_monday"+idwd).value;
                  var x = document.getElementById("break_monday"+idwd);
                  
                 if ( val=='Partial'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
function breaktimeF(idwd) {
      var val= document.getElementById("breaktime_Friday"+idwd).value;
                  var x = document.getElementById("break_Friday"+idwd);
                  
                 if ( val=='Partial'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
function breaktimeW(idwd) {
      var val= document.getElementById("breaktime_Wednesday"+idwd).value;
                  var x = document.getElementById("break_Wednesday"+idwd);
                  
                 if ( val=='Partial'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
function breaktimeTH(idwd) {
      var val= document.getElementById("breaktime_Thursday"+idwd).value;
                  var x = document.getElementById("break_Thursday"+idwd);
                  
                 if ( val=='Partial'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
function breaktimeT(idwd) {
      var val= document.getElementById("breaktime_Tuesday"+idwd).value;
                  var x = document.getElementById("break_Tuesday"+idwd);
                  
                 if ( val=='Partial'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
function breaktimeSA(idwd) {
      var val= document.getElementById("breaktime_Saturday"+idwd).value;
                  var x = document.getElementById("break_Saturday"+idwd);
                  
                 if ( val=='Partial'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
function breaktimeSU(idwd) {
      var val= document.getElementById("breaktime_Sunday"+idwd).value;
                  var x = document.getElementById("break_Sunday"+idwd);
                  
                 if ( val=='Partial'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
   
   
   
   
   
    
function openchoicesStateT(idwd) {
      var val= document.getElementById("state_Tuesday"+idwd).value;
                  var x = document.getElementById("open_time_Tuesday"+idwd);
                  
                 if ( val=='open time'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
function openchoicesStateW(idwd) {
      var val= document.getElementById("state_Wednesday"+idwd).value;
                  var x = document.getElementById("open_time_Wednesday"+idwd);
                  
                 if ( val=='open time'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
function openchoicesStateTH(idwd) {
      var val= document.getElementById("state_Thursday"+idwd).value;
                  var x = document.getElementById("open_time_Thursday"+idwd);
                  
                 if ( val=='open time'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
function openchoicesStateF(idwd) {
      var val= document.getElementById("state_Friday"+idwd).value;
                  var x = document.getElementById("open_time_Friday"+idwd);
                  
                 if ( val=='open time'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
function openchoicesStateSA(idwd) {
      var val= document.getElementById("state_Saturday"+idwd).value;
                  var x = document.getElementById("open_time_Saturday"+idwd);
                  
                 if ( val=='open time'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
function openchoicesStateSU(idwd) {
      var val= document.getElementById("state_Sunday"+idwd).value;
                  var x = document.getElementById("open_time_Sunday"+idwd);
                  
                 if ( val=='open time'   ) {
                 x.style.display = "block";      
} else {x.style.display = "none";}};
 
 
    
    // monday 
   

  </script>
    
    
            </div>
            <div class="form-group">
            <label for="choices">Select the working days</label><br>
            <input type="text" hidden='true' name="id_department" id="id_department"value="{{$ser->id}}">
            <center><a id='Monday_btn'class="btn_0" onclick="Monday(<?php echo $ser->id; ?>)">Monday</a><a  class="btn_0" onclick="Tuesday(<?php echo $ser->id; ?>)"id="Tuesday_btn">Tuesday</a><a class="btn_0" onclick="Wednesday(<?php echo $ser->id; ?>)" id="Wednesday_btn">Wednesday</a><a class="btn_0" onclick="Thursday(<?php echo $ser->id; ?>)" id="Thursday_btn">Thursday</a><a class="btn_0" onclick="Friday(<?php echo $ser->id; ?>)" id="Friday_btn">Friday</a><a class="btn_0" onclick="Saturday(<?php echo $ser->id; ?>)" id="Saturday_btn">Saturday</a><a class="btn_0" onclick="Sunday(<?php echo $ser->id; ?>)" id="Sunday_btn">Sunday</a></center>
            </div>
<!--------Monday start----->


<div id="Monday<?php echo $ser->id; ?>" style="display: none;">
            <div class="form-group ">
                <center><label for="title_monday">Monday</label></center>
            </div>
            <div class="form-group ">
                <label for="start_monday">start Time:</label>
                <input type="datetime-local" name="start_monday" id="start_monday<?php echo $ser->id; ?>"  placeholder="yy/mm/dd 00:00">
             
            </div>
     <!--        <script>jQuery(function($){
$("#start_monday").datepicker({ minDate: 0,beforeShowDay: function(date)
{var day = date.getDay(); 
  return [day == 1 ];} }); });
  </script> -->
            <div class="form-group ">
                <label for="end_monday">End time:</label>
               <input type="datetime-local" name="end_monday" id="end_monday<?php echo $ser->id; ?>" placeholder="yy/mm/dd 00:00" >
            </div>
            <div class="form-group ">
                <label>recurrence</label>
                    <div>
                        <input id="recurrence_monday" name="recurrence_monday" type="radio" value="Daily"  >
                        <label for="recurrence_monday">Daily</label>
                        <input id="recurrence_monday" name="recurrence_monday" type="radio" value="Weekly"  >
                        <label for="recurrence_monday">Weekly</label>
                    </div>
            </div>
            
            <div class='form-group'>
              <label>State:</label>
              <select name="state_monday" id="state_monday<?php echo $ser->id;?>"  onchange="openchoicesStateM(<?php echo $ser->id;?>)" >
              <option class="form-control" value="">Select option</option>
                <option class="form-control" value="open time">open time</option>
                <option class="form-control" value="00:30">00:30</option>
                <option class="form-control"value="01:00">01:00</option>
                <option class="form-control" value="01:30">01:30</option>
                <option class="form-control" value="02:00">02:00</option>
                <option class="form-control" value="02:30" >02:30</option>
              </select>
            </div>
            <script>function openchoicesStateM(idwd) {
      var val= document.getElementById("state_monday"+idwd).value;


     
                  var x = document.getElementById("open_time_monday"+idwd);
                 if ( val=='open time'   ) { 
                 x.style.display = "block";      
} else {x.style.display = "none";}};</script>
            <meta type="hidden" name="csrf-token" content="{{ csrf_token() }}" />

          
            <div class='form-group'  style="display:none;"  id='open_time_monday<?php echo $ser->id;?>' style="height: 27px;" >
              <label>limit of attendees</label>
              <input type="number" name="limit_of_attendees_monday" id="limit_of_attendees_monday<?php echo $ser->id;?>" placeholder="1">
            </div>
            <div class='form-group'>
              <label>Background Color</label>
              <input type="color" class='form-group' id='color_monday' name='color_monday' >
            </div>
            <div class='form-group'>
              <label>Text Color</label>
              <input type="color" class='form-group'  id='textColor_monday' name='textColor_monday' >
            </div>
            <div class='form-group'>
              <label>All Day</label>
              <select name="breaktime_monday" id="breaktime_monday<?php echo $ser->id;?>" onchange="breaktimeM(<?php echo $ser->id;?>)">
                <option class="form-control" value="All Day">All Day</option>
                <option class="form-control" value="Partial">Partial</option>
             </select>
        </div>
            <div  id='break_monday<?php echo $ser->id;?>'  style="display:none;height: 90px;" >
             <!-- start date -->
             <div class="form-group">
                            <label class="label" for="start_break_monday">break start date</label>
                           <input type="time" name="start_break_monday" placeholder="00:00" id="start_break_monday<?php echo $ser->id; ?>">
              </div>      
      
            <!-- start date -->
             <!-- end date -->
             <div class="form-group">
                            <label class="label" for="end_break_monday">break end date</label>
                           <input type="time" name="end_break_monday" placeholder="00:00" id="end_break_monday<?php echo $ser->id; ?>">
              </div>      
                      
            <!-- end date -->
            </div>
            <div class="form-group">         
               <a class="btn_0" type="submit"id="save" style="text-align:center" onclick="Save(<?php echo $ser->id;?>)">Save</a>
            </div>
          </div>

<!-----Mondayy end----->



<!--------tuesday start----->
<div id="Tuesday<?php echo $ser->id;?>"  style="display: none;">
            <div class="form-group ">
                <label for="start_Tuesday">start Time:</label>
                <input type="datetime-local" name="start_Tuesday" id="start_Tuesday<?php echo $ser->id; ?>"  placeholder="yy/mm/dd 00:00">
              
            </div>
            <div class="form-group ">
                <label for="end_Tuesday">End time:</label>
               <input type="datetime-local" name="end_Tuesday" id="end_Tuesday<?php echo $ser->id; ?>" placeholder="yy/mm/dd 00:00" >

                
                
            </div>
            <div class="form-group ">
                <label>recurrence</label>
                    <div>
                        <input id="recurrence_Tuesday" name="recurrence_Tuesday" type="radio" value="Daily"  >
                        <label for="recurrence_Tuesday">Daily</label>
                        <input id="recurrence_Tuesday" name="recurrence_Tuesday" type="radio" value="Weekly"  >
                        <label for="recurrence_Tuesday">Weekly</label>
                    </div>
              
            
            </div>
            
            <div class='form-group'>
              <label>State:</label>
              <select name="state_Tuesday" id="state_Tuesday<?php echo $ser->id;?>" onchange="openchoicesStateT(<?php echo $ser->id;?>)">
              <option class="form-control" value="">Select option</option>
                <option class="form-control" value="open time">open time</option>
                <option class="form-control" value="00:30">00:30</option>
                <option class="form-control"value="01:00">01:00</option>
                <option class="form-control" value="01:30">01:30</option>
                <option class="form-control" value="02:00">02:00</option>
                <option class="form-control" value="02:30" >02:30</option>
              </select>
            </div>
          
            <div class='form-group' style="display:none;" name='open_time_Tuesday' id='open_time_Tuesday<?php echo $ser->id;?>' style="height: 27px;" >
              <label>limit of attendees</label>
              <input type="number" name="limit_of_attendees_Tuesday" id="limit_of_attendees_Tuesday<?php echo $ser->id;?>" placeholder="1">
            </div>
            <div class='form-group'>
              <label>Background Color</label>
              <input type="color" class='form-group' id='color_Tuesday' name='color_Tuesday' >
            </div>
            <div class='form-group'>
              <label>Text Color</label>
              <input type="color" class='form-group'  id='textColor_Tuesday' name='textColor_Tuesday' >
            </div>
            <div class='form-group'>
              <label>All Day</label>
              <select name="breaktime_Tuesday" id="breaktime_Tuesday<?php echo $ser->id;?>" onchange="breaktimeT(<?php echo $ser->id;?>)">
                <option class="form-control" value="All Day">All Day</option>
                <option class="form-control" value="Partial">Partial</option>
             </select>
        </div>
            <div  id='break_Tuesday<?php echo $ser->id;?>'   style="display:none;height: 90px;" >
             <!-- start date -->
             <div class="form-group">
                  <label class="label" for="start_break_Tuesday">break start date</label>
                  <input type="time" name="start_break_Tuesday" id="start_break_Tuesday<?php echo $ser->id; ?>" placeholder="00:00">
              </div>                    
            <!-- start date -->
             <!-- end date -->
             <div class="form-group">
                            <label class="label" for="end_break_Tuesday">break end date</label>
                           <input type="time" name="end_break_Tuesday" placeholder="00:00" id="end_break_Tuesday<?php echo $ser->id; ?>">
                        </div>                    
            <!-- end date -->
            </div>
            <div class="form-group">         
               <a class="btn_0" type="submit"id="save1" style="text-align:center" onclick="Save1(<?php echo $ser->id;?>)">Save</a>
            </div>
          </div>
<!-----tuesdayy end----->



<!--------wednesday start----->
<div id="Wednesday<?php echo $ser->id; ?>"  style="display: none;">
          
            <div class="form-group">
                <label for="start_Wednesday">start Time:</label>
                <input type="datetime-local" name="start_Wednesday" id="start_Wednesday<?php echo $ser->id; ?>"  placeholder="yy/mm/dd 00:00">
               
            </div>
            <div class="form-group">
                <label for="end_Wednesday">End time:</label>
               <input type="datetime-local" name="end_Wednesday" id="end_Wednesday<?php echo $ser->id; ?>" placeholder="yy/mm/dd 00:00" >

               
                
            </div>
            <div class="form-group ">
                <label>recurrence</label>
                    <div>
                        <input id="recurrence_Wednesday" name="recurrence_Wednesday" type="radio" value="Daily"  >
                        <label for="recurrence_Wednesday">Daily</label>
                        <input id="recurrence_Wednesday" name="recurrence_Wednesday" type="radio" value="Weekly"  >
                        <label for="recurrence_Wednesday">Weekly</label>
                    </div>
              
                
            </div>
            
            <div class='form-group'>
              <label>State:</label>
              <select name="state_Wednesday" id="state_Wednesday<?php echo $ser->id;?>" onchange="openchoicesStateW(<?php echo $ser->id;?>)">
              <option class="form-control" value="">Select option</option>
                <option class="form-control" value="open time">open time</option>
                <option class="form-control" value="00:30">00:30</option>
                <option class="form-control"value="01:00">01:00</option>
                <option class="form-control" value="01:30">01:30</option>
                <option class="form-control" value="02:00">02:00</option>
                <option class="form-control" value="02:30" >02:30</option>
              </select>
            </div>
          
            <div class='form-group' style="display:none;" name='open_time_Wednesday' id='open_time_Wednesday<?php echo $ser->id;?>' style="height: 27px;" >
              <label>limit of attendees</label>
              <input type="number" name="limit_of_attendees_Wednesday" id="limit_of_attendees_Wednesday<?php echo $ser->id;?>" placeholder="1">
            </div>
            <div class='form-group'>
              <label>Background Color</label>
              <input type="color" class='form-group' id='color_Wednesday' name='color_Wednesday' >
            </div>
            <div class='form-group'>
              <label>Text Color</label>
              <input type="color" class='form-group'  id='textColor_Wednesday' name='textColor_Wednesday' >
            </div>
            <div class='form-group'>
              <label>All Day</label>
              <select name="breaktime_Wednesday" id="breaktime_Wednesday<?php echo $ser->id;?>" onchange="breaktimeW(<?php echo $ser->id;?>)">
                <option class="form-control" value="All Day">All Day</option>
                <option class="form-control" value="Partial">Partial</option>
             </select>
        </div>
            <div  id='break_Wednesday<?php echo $ser->id;?>'   style="display:none;height: 90px;" >
             <!-- start date -->
             <div class="form-group">
                  <label class="label" for="start_break_Wednesday">break start date</label>
                  <input type="time" name="start_break_Wednesday" id="start_break_Wednesday<?php echo $ser->id; ?>" placeholder="00:00">
              </div>                    
            <!-- start date -->
             <!-- end date -->
             <div class="form-group">
                            <label class="label" for="end_break_Wednesday">break end date</label>
                           <input type="time" name="end_break_Wednesday" placeholder=" 00:00" id="end_break_Wednesday<?php echo $ser->id; ?>">
                        </div>                    
            <!-- end date -->
            </div>
            <div class="form-group">         
               <a class="btn_0" type="submit"id="save2" style="text-align:center" onclick="Save2(<?php echo $ser->id;?>)">Save</a>
            </div>
          </div>
<!-----Wednesdayy end----->



<!--------thursday start----->
<div id="Thursday<?php echo $ser->id; ?>"  style="display: none;">
            
            <div class="form-group ">
                <label for="start_Thursday">start Time:</label>
                <input type="datetime-local" name="start_Thursday" id="start_Thursday<?php echo $ser->id; ?>"  placeholder="yy/mm/dd 00:00">
                
            </div>
            <div class="form-group">
                <label for="end_Thursday">End time:</label>
               <input type="datetime-local" name="end_Thursday" id="end_Thursday<?php echo $ser->id; ?>" placeholder="yy/mm/dd 00:00" >

              
                
            </div>
            <div class="form-group ">
                <label>recurrence</label>
                    <div>
                        <input id="recurrence_Thursday" name="recurrence" type="radio" value="Daily"  >
                        <label for="recurrence_Thursday">Daily</label>
                        <input id="recurrence_Thursday" name="recurrence_Thursday" type="radio" value="Weekly"  >
                        <label for="recurrence_Thursday">Weekly</label>
                    </div>
              
             
            </div>
            
            <div class='form-group'>
              <label>State:</label>
              <select name="state_Thursday" id="state_Thursday<?php echo $ser->id;?>" onchange="openchoicesStateTH(<?php echo $ser->id;?>)">
              <option class="form-control" value="">Select option</option>
                <option class="form-control" value="open time">open time</option>
                <option class="form-control" value="00:30">00:30</option>
                <option class="form-control"value="01:00">01:00</option>
                <option class="form-control" value="01:30">01:30</option>
                <option class="form-control" value="02:00">02:00</option>
                <option class="form-control" value="02:30" >02:30</option>
              </select>
            </div>
          
            <div class='form-group' style="display:none;" name='open_time_Thursday' id='open_time_Thursday<?php echo $ser->id;?>' style="height: 27px;" >
              <label>limit of attendees</label>
              <input type="number" name="limit_of_attendees_Thursday" id="limit_of_attendees_Thursday<?php echo $ser->id;?>" placeholder="1">
            </div>
            <div class='form-group'>
              <label>Background Color</label>
              <input type="color" class='form-group' id='color_Thursday' name='color_Thursday' >
            </div>
            <div class='form-group'>
              <label>Text Color</label>
              <input type="color" class='form-group'  id='textColor_Thursday' name='textColor_Thursday' >
            </div>
            <div class='form-group'>
              <label>All Day</label>
              <select name="breaktime_Thursday" id="breaktime_Thursday<?php echo $ser->id;?>" onchange="breaktimeTH(<?php echo $ser->id;?>)">
                <option class="form-control" value="All Day">All Day</option>
                <option class="form-control" value="Partial">Partial</option>
             </select>
        </div>
            <div  id='break_Thursday<?php echo $ser->id;?>'  style="display:none;height: 90px;" >
             <!-- start date -->
             <div class="form-group">
                  <label class="label" for="start_break_Thursday">break start date</label>
                  <input type="time" name="start_break_Thursday" id="start_break_Thursday<?php echo $ser->id; ?>" placeholder="00:00">
              </div>                    
            <!-- start date -->
             <!-- end date -->
             <div class="form-group">
                            <label class="label" for="end_break_Thursday">break end date</label>
                           <input type="time" name="end_break_Thursday" placeholder="00:00" id="end_break_Thursday<?php echo $ser->id; ?>">
                        </div>                    
            <!-- end date -->
            </div>
            <div class="form-group">         
               <a class="btn_0" type="submit"id="save3" style="text-align:center" onclick="Save3(<?php echo $ser->id;?>)">Save</a>
            </div>
          </div>
<!-----thursdayy end----->



<!--------Friday start----->
<div id="Friday<?php echo $ser->id; ?>"  style="display: none;">
            <div class="form-group ">
                <label for="start_Friday">start Time:</label>
                <input type="datetime-local" name="start_Friday" id="start_Friday<?php echo $ser->id; ?>"  placeholder="yy/mm/dd 00:00">
               
            </div>
            <div class="form-group ">
                <label for="end">End time:</label>
               <input type="datetime-local" name="end_Friday" id="end_Friday<?php echo $ser->id; ?>" placeholder="yy/mm/dd 00:00" >

             
                
            </div>
            <div class="form-group {{ $errors->has('recurrence_Friday') ? 'has-error' : '' }}">
                <label>recurrence</label>
                    <div>
                        <input id="recurrence_Friday" name="recurrence_Friday" type="radio" value="Daily"  >
                        <label for="recurrence_Friday">Daily</label>
                        <input id="recurrence_Friday" name="recurrence_Friday" type="radio" value="Weekly"  >
                        <label for="recurrence_Friday">Weekly</label>
                    </div>

            </div>
            
            <div class='form-group'>
              <label>State:</label>
              <select name="state_Friday" id="state_Friday<?php echo $ser->id;?>" onchange="openchoicesStateF(<?php echo $ser->id;?>)">
              <option class="form-control" value="">Select option</option>
                <option class="form-control" value="open time">open time</option>
                <option class="form-control" value="00:30">00:30</option>
                <option class="form-control"value="01:00">01:00</option>
                <option class="form-control" value="01:30">01:30</option>
                <option class="form-control" value="02:00">02:00</option>
                <option class="form-control" value="02:30" >02:30</option>
              </select>
            </div>
          
            <div class='form-group' style="display:none;" name='open_time_Friday' id='open_time_Friday<?php echo $ser->id;?>' style="height: 27px;" >
              <label>limit of attendees</label>
              <input type="number" name="limit_of_attendees_Friday" id="limit_of_attendees_Friday<?php echo $ser->id;?>" placeholder="1">
            </div>
            <div class='form-group'>
              <label>Background Color</label>
              <input type="color" class='form-group' id='color_Friday' name='color_Friday' >
            </div>
            <div class='form-group'>
              <label>Text Color</label>
              <input type="color" class='form-group'  id='textColor_Friday' name='textColor_Friday' >
            </div>
            <div class='form-group'>
              <label>All Day</label>
              <select name="breaktime_Friday" id="breaktime_Friday<?php echo $ser->id;?>" onchange="breaktimeF(<?php echo $ser->id;?>)">
                <option class="form-control" value="All Day">All Day</option>
                <option class="form-control" value="Partial">Partial</option>
             </select>
        </div>
            <div  id='break_Friday<?php echo $ser->id;?>' style="display:none;height: 90px;" >
             <!-- start date -->
             <div class="form-group">
                  <label class="label" for="start_break_Friday">break start date</label>
                  <input type="time" name="start_break_Friday" id="start_break_Friday<?php echo $ser->id; ?>" placeholder=" 00:00">
              </div>                    
            <!-- start date -->
             <!-- end date -->
             <div class="form-group">
                            <label class="label" for="end_break_Friday">break end date</label>
                           <input type="time" name="end_break_Friday" placeholder="00:00" id="end_break_Friday<?php echo $ser->id; ?>">
                        </div>                    
            <!-- end date -->
            </div>
            <div class="form-group">         
               <a class="btn_0" type="submit"id="save4" style="text-align:center" onclick="Save4(<?php echo $ser->id;?>)">Save</a>
            </div>
          </div>
<!-----Fridayy end----->



<!--------Saturday start----->
<div id="Saturday<?php echo $ser->id; ?>"  style="display: none;">
          
            <div class="form-group ">
                <label for="start_Saturday">start Time:</label>
                <input type="datetime-local" name="start_Saturday" id="start_Saturday<?php echo $ser->id; ?>"  placeholder="yy/mm/dd 00:00" >
               
            </div>
            <div class="form-group ">
                <label for="end_Saturday">End time:</label>
               <input type="datetime-local" name="end_Saturday" id="end_Saturday<?php echo $ser->id; ?>" placeholder="yy/mm/dd 00:00" >

               
                
            </div>
            <div class="form-group ">
                <label>recurrence</label>
                    <div>
                        <input id="recurrence_Saturday" name="recurrence_Saturday" type="radio" value="Daily"  >
                        <label for="recurrence_Saturday">Daily</label>
                        <input id="recurrence_Saturday" name="recurrence_Saturday" type="radio" value="Weekly"  >
                        <label for="recurrence_Saturday">Weekly</label>
                    </div>
              
    
            </div>
            
            <div class='form-group'>
              <label>State:</label>
              <select name="state_Saturday" id="state_Saturday<?php echo $ser->id;?>"  onchange="openchoicesStateSA(<?php echo $ser->id;?>)">
              <option class="form-control" value="">Select option</option>
                <option class="form-control" value="open time">open time</option>
                <option class="form-control" value="00:30">00:30</option>
                <option class="form-control"value="01:00">01:00</option>
                <option class="form-control" value="01:30">01:30</option>
                <option class="form-control" value="02:00">02:00</option>
                <option class="form-control" value="02:30" >02:30</option>
              </select>
            </div>
          
            <div class='form-group' style="display:none;" name='open_time_Saturday' id='open_time_Saturday<?php echo $ser->id;?>' style="height: 27px;" >
              <label>limit of attendees</label>
              <input type="number" name="limit_of_attendees_Saturday" id="limit_of_attendees_Saturday<?php echo $ser->id;?>" placeholder="1">
            </div>
            <div class='form-group'>
              <label>Background Color</label>
              <input type="color" class='form-group' id='color_Saturday' name='color_Saturday' >
            </div>
            <div class='form-group'>
              <label>Text Color</label>
              <input type="color" class='form-group'  id='textColor_Saturday' name='textColor_Saturday' >
            </div>
            <div class='form-group'>
              <label>All Day</label>
              <select name="breaktime_Saturday" id="breaktime_Saturday<?php echo $ser->id;?>" onchange="breaktimeSA(<?php echo $ser->id;?>)">
                <option class="form-control" value="All Day">All Day</option>
                <option class="form-control" value="Partial">Partial</option>
             </select>
        </div>
            <div  id='break_Saturday<?php echo $ser->id;?>'  style="display:none;height: 90px;" >
             <!-- start date -->
             <div class="form-group">
                  <label class="label" for="start_break_Saturday">break start date</label>
                  <input type="time" name="start_break_Saturday" id="start_break_Saturday<?php echo $ser->id; ?>" placeholder=" 00:00">
              </div>                    
            <!-- start date -->
             <!-- end date -->
             <div class="form-group">
                            <label class="label" for="end_break_Saturday">break end date</label>
                           <input type="time" name="end_break_Saturday" placeholder=" 00:00" id="end_break_Saturday<?php echo $ser->id; ?>">
                        </div>                    
            <!-- end date -->
            </div>
            <div class="form-group">         
               <a class="btn_0" type="submit"id="save5" style="text-align:center" onclick="Save5(<?php echo $ser->id;?>)">Save</a>
            </div>
          </div>
<!-----Saturdayy end----->



<!--------Sundy start----->
<div id="Sunday<?php echo $ser->id; ?>"  style="display: none;">
            
            <div class="form-group ">
                <label for="start_Sunday">start Time:</label>
                <input type="datetime-local" name="start_Sunday" id="start_Sunday<?php echo $ser->id; ?>"  placeholder="yy/mm/dd 00:00">
              
            </div>
            <div class="form-group ">
                <label for="end">End time:</label>
               <input type="datetime-local" name="end_Sunday" id="end_Sunday<?php echo $ser->id; ?>" placeholder="yy/mm/dd 00:00" >

              
                
            </div>
            <div class="form-group ">
                <label>recurrence</label>
                    <div>
                        <input id="recurrence_Sunday" name="recurrence_Sunday" type="radio" value="Daily"  >
                        <label for="recurrence_Sunday">Daily</label>
                        <input id="recurrence_Sunday" name="recurrence_Sunday" type="radio" value="Weekly"  >
                        <label for="recurrence_Sunday">Weekly</label>
                    </div>
              
              
            </div>
            
            <div class='form-group'>
              <label>State:</label>
              <select name="state_Sunday" id="state_Sunday<?php echo $ser->id;?>" onchange="openchoicesStateSU(<?php echo $ser->id;?>)">
              <option class="form-control" value="">Select option</option>
                <option class="form-control" value="open time">open time</option>
                <option class="form-control" value="00:30">00:30</option>
                <option class="form-control"value="01:00">01:00</option>
                <option class="form-control" value="01:30">01:30</option>
                <option class="form-control" value="02:00">02:00</option>
                <option class="form-control" value="02:30" >02:30</option>
              </select>
            </div>
          
            <div class='form-group'  style="display:none;"name='open_time_Sunday' id='open_time_Sunday<?php echo $ser->id;?>' style="height: 27px;" >
              <label>limit of attendees</label>
              <input type="number" name="limit_of_attendees_Sunday" id="limit_of_attendees_Sunday<?php echo $ser->id;?>" placeholder="1">
            </div>
            <div class='form-group'>
              <label>Background Color</label>
              <input type="color" class='form-group' id='color_Sunday' name='color_Sunday' >
            </div>
            <div class='form-group'>
              <label>Text Color</label>
              <input type="color" class='form-group'  id='textColor_Sunday' name='textColor_Sunday' >
            </div>
            <div class='form-group'>
              <label>All Day</label>
              <select name="breaktime_Sunday" id="breaktime_Sunday<?php echo $ser->id;?>" onchange="breaktimeSU(<?php echo $ser->id;?>)">
                <option class="form-control" value="All Day">All Day</option>
                <option class="form-control" value="Partial">Partial</option>
             </select>
        </div>
            <div  id='break_Sunday<?php echo $ser->id;?>'  style="display:none;height: 90px;" >
             <!-- start date -->
             <div class="form-group">
                  <label class="label" for="start_break_Sunday">break start date</label>
                  <input type="time" name="start_break_Sunday" id="start_break_Sunday<?php echo $ser->id; ?>" placeholder=" 00:00">
              </div>                    
            <!-- start date -->
             <!-- end date -->
             <div class="form-group">
                            <label class="label" for="end_break_Sunday">break end date</label>
                           <input type="time" name="end_break_Sunday" placeholder="00:00" id="end_break_Sunday<?php echo $ser->id; ?>">
                        </div>                    
            <!-- end date -->
            </div>
            <div class="form-group">         
               <a class="btn_0" type="submit"id="save6" style="text-align:center" onclick="Save6(<?php echo $ser->id;?>)">Save</a>
            </div>
          </div>
<!-----Sunday end----->




            <div class='form-group'>
            <a type="button" class="btn btn-secondary"   href=" {{route('close')}}" >Close</a>
              </button>
            </div>
        </div>
      </div></div></div>
  
    <script>
    
    function Monday(id) {
      var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  m.style.display == "none")//show none=hide
  {
      m.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {m.style.display = "none";}};
      function Tuesday(id) {
      var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  t.style.display == "none") {
      t.style.display = "block";  m.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {t.style.display = "none";}};
      function Wednesday(id) {
        var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  w.style.display == "none") {
      w.style.display = "block";  t.style.display = "none";m.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {w.style.display = "none";}};
      function Thursday(id) {
        var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  th.style.display == "none") {
      th.style.display = "block";  t.style.display = "none";w.style.display = "none";m.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {th .style.display = "none";}};
      function Friday(id) {
        var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  f.style.display == "none") {
      f.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";m.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {f.style.display = "none";}};
      function Saturday(id) {
        var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  sa.style.display == "none") {
      sa.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";m.style.display = "none";su.style.display = "none";} else {sa.style.display = "none";}};
  function Sunday(id) {
    var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  su.style.display == "none") {
      su.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";m.style.display = "none";} else {su.style.display = "none";}};

    </script>
      @endforeach
      <!-- End of event dialog -->

      <script>
function Save(id){
var id_department=id;
var start=document.getElementById("start_monday"+id).value;
var end=document.getElementById("end_monday"+id).value;
var recurrence = $("input[name='recurrence_monday']:checked").val();
var state=document.getElementById("state_monday"+id).value;
var limit_of_attendees=document.getElementById("limit_of_attendees_monday"+id).value;
var color=$('#color_monday').val();
var textColor=$('#textColor_monday').val();
var breaktime=document.getElementById("breaktime_monday"+id).value;
var start_break=document.getElementById("start_break_monday"+id).value;
var end_break=document.getElementById("end_break_monday"+id).value;
var _token = $('input[name="_token"]').val();
$.ajax({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
url:"{{ route('ServiceConfigure') }}",
method:"POST",
data:{start:start,end:end,recurrence:recurrence,state:state,limit_of_attendees:limit_of_attendees,color:color,textColor:textColor,breaktime:breaktime,start_break:start_break,end_break:end_break,id_department:id_department, _token: '{{csrf_token()}}' }, 
success:function(data){console.log(data);},});};

function Save1(id){                       
var id_department=id;
var start=document.getElementById("start_Tuesday"+id).value;
var end=document.getElementById("end_Tuesday"+id).value;
var recurrence = $("input[name='recurrence_Tuesday']:checked").val();
var state=document.getElementById("state_Tuesday"+id).value;
var open_time=$('#open_time_Tuesday').val();
var limit_of_attendees=document.getElementById("limit_of_attendees_Tuesday"+id).value;
var color=$('#color_Tuesday').val();
var textColor=$('#textColor_Tuesday').val();
var breaktime=document.getElementById("breaktime_Tuesday"+id).value;
var start_break=document.getElementById("start_break_Tuesday"+id).value;
var end_break=document.getElementById("end_break_Tuesday"+id).value;
var _token = $('input[name="_token"]').val();
$.ajax({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
url:"{{ route('ServiceConfigure') }}",
method:"POST",
data:{start:start,end:end,recurrence:recurrence,state:state,limit_of_attendees:limit_of_attendees,color:color,textColor:textColor,breaktime:breaktime,start_break:start_break,end_break:end_break,id_department:id_department, _token: '{{csrf_token()}}' }, 
success:function(data){console.log(data);},});};

function Save2(id){
var id_department=id;
var start=document.getElementById("start_Wednesday"+id).value;
var end=document.getElementById("end_Wednesday"+id).value;
var recurrence = $("input[name='recurrence_Wednesday']:checked").val();

var state=document.getElementById("state_Wednesday"+id).value;
var open_time=$('#open_time_Wednesday').val();
var limit_of_attendees=document.getElementById("limit_of_attendees_Wednesday"+id).value;
var color=$('#color_Wednesday').val();
var textColor=$('#textColor_Wednesday').val();
var breaktime=document.getElementById("breaktime_Wednesday"+id).value;
var start_break=document.getElementById("start_break_Wednesday"+id).value;
var end_break=document.getElementById("end_break_Wednesday"+id).value;
var _token = $('input[name="_token"]').val();
$.ajax({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
url:"{{ route('ServiceConfigure') }}",
method:"POST",
data:{start:start,end:end,recurrence:recurrence,state:state,limit_of_attendees:limit_of_attendees,color:color,textColor:textColor,breaktime:breaktime,start_break:start_break,end_break:end_break,id_department:id_department, _token: '{{csrf_token()}}' }, 
success:function(data){alert(data);},});};
function Save3(id){
var id_department=id;
var start=document.getElementById("start_Thursday"+id).value;
var end=document.getElementById("end_Thursday"+id).value;
var recurrence = $("input[name='recurrence_Thursday']:checked").val();
var state=document.getElementById("state_Thursday"+id).value;
var open_time=$('#open_time_Thursday').val();
var limit_of_attendees=document.getElementById("limit_of_attendees_Thursday"+id).value;
var color=$('#color_Thursday').val();
var textColor=$('#textColor_Thursday').val();
var breaktime=document.getElementById("breaktime_Thursday"+id).value;
var start_break=document.getElementById("start_break_Thursday"+id).value;
var end_break=document.getElementById("end_break_Thursday"+id).value;
var _token = $('input[name="_token"]').val();
$.ajax({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
url:"{{ route('ServiceConfigure') }}",
method:"POST",
data:{start:start,end:end,recurrence:recurrence,state:state,limit_of_attendees:limit_of_attendees,color:color,textColor:textColor,breaktime:breaktime,start_break:start_break,end_break:end_break,id_department:id_department, _token: '{{csrf_token()}}' }, 
success:function(data){alert(data);},});};
function Save4(id){
var id_department=id;
var start=document.getElementById("start_Friday"+id).value;
var end=document.getElementById("end_Friday"+id).value;
var recurrence = $("input[name='recurrence_Friday']:checked").val();

var state=document.getElementById("state_Friday"+id).value;
var open_time=$('#open_time_Friday').val();
var limit_of_attendees=document.getElementById("limit_of_attendees_Friday"+id).value;
var color=$('#color_Friday').val();
var textColor=$('#textColor_Friday').val();
var breaktime=document.getElementById("breaktime_Friday"+id).value;
var start_break=document.getElementById("start_break_Friday"+id).value;
var end_break=document.getElementById("end_break_Friday"+id).value;
var _token = $('input[name="_token"]').val();
$.ajax({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
url:"{{ route('ServiceConfigure') }}",
method:"POST",
data:{start:start,end:end,recurrence:recurrence,state:state,limit_of_attendees:limit_of_attendees,color:color,textColor:textColor,breaktime:breaktime,start_break:start_break,end_break:end_break,id_department:id_department, _token: '{{csrf_token()}}' }, 
success:function(data){alert(data);},});};
function Save5(id){
var id_department=id;
var start=document.getElementById("start_Saturday"+id).value;
var end=document.getElementById("end_Saturday"+id).value;
var recurrence = $("input[name='recurrence_Saturday']:checked").val();
var state=document.getElementById("state_Saturday"+id).value;
var open_time=$('#open_time_Saturday').val();
var limit_of_attendees=document.getElementById("limit_of_attendees_Saturday"+id).value;
var color=$('#color_Saturday').val();
var textColor=$('#textColor_Saturday').val();
var breaktime=document.getElementById("breaktime_Saturday"+id).value;
var start_break=document.getElementById("start_break_Saturday"+id).value;
var end_break=document.getElementById("end_break_Saturday"+id).value;
var _token = $('input[name="_token"]').val();
$.ajax({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
url:"{{ route('ServiceConfigure') }}",
method:"POST",
data:{start:start,end:end,recurrence:recurrence,state:state,limit_of_attendees:limit_of_attendees,color:color,textColor:textColor,breaktime:breaktime,start_break:start_break,end_break:end_break,id_department:id_department, _token: '{{csrf_token()}}' }, 
success:function(data){alert(data);},});};
function Save6(id){
var id_department=id;
var start=document.getElementById("start_Sunday"+id).value;
var end=document.getElementById("end_Sunday"+id).value;
var recurrence = $("input[name='recurrence_Sunday']:checked").val();
var state=document.getElementById("state_Sunday"+id).value;
var open_time=$('#open_time_Sunday').val();
var limit_of_attendees=document.getElementById("limit_of_attendees_Sunday"+id).value;
var color=$('#color_Sunday').val();
var textColor=$('#textColor_Sunday').val();
var breaktime=document.getElementById("breaktime_Sunday"+id).value;
var start_break=document.getElementById("start_break_Sunday"+id).value;
var end_break=document.getElementById("end_break_Sunday"+id).value;
var _token = $('input[name="_token"]').val();
$.ajax({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
},
url:"{{ route('ServiceConfigure') }}",
method:"POST",
data:{start:start,end:end,recurrence:recurrence,state:state,limit_of_attendees:limit_of_attendees,color:color,textColor:textColor,breaktime:breaktime,start_break:start_break,end_break:end_break,id_department:id_department, _token: '{{csrf_token()}}' }, 
success:function(data){alert(data);},});};

</script>
      <script>
      $(document).ready(function() {
  function convert(str){
   const d= new Date(str);
   let month= '' +(d.getMonth()+1);
   let day= '' + d.getDate();
   let year= d.getFullYear();
   if(month.length < 2) month ='0' + month;
   if(day.length < 2) day ='0' + day;
   let hour= '' +(2+ d.getUTCHours());//heure ghalta
   let minutes= '' + d.getUTCMinutes();
   let seconds= '' + d.getUTCSeconds();
   if(hour.length < 2) hour ='0' + hour;
   if(minutes.length < 2) minutes ='0' + minutes;
   if(seconds.length < 2) seconds ='0' + seconds;
   return[year,month,day].join('-')+' '+[hour,minutes,seconds].join(':');
 };

 
 
 var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
$.fn.bootstrapBtn = bootstrapButton      
// page is now ready, initialize the calendar...

var calendar = $('#calendar').fullCalendar({
 // put your options and callbacks here
 selectable: true,
 height: "auto",
 showNonCurrentDates: false,
 editable:false,
 defaultView: 'month',
 yearColumns: 3,
 timezone: 'local',
 selectHelper: true,
 header: {
   left: 'prev,next today',
   center: 'title',
   right: 'year,month,basicWeek,basicDay'

 },

      
 eventClick:function(event){
   $('#title').val(event.title);
   $('#start').val(convert(event.start));
   $('#end').val(convert(event.end));
   $('#color').val(event.color);
   $('#textColor').val(event.textColor);
   $('#event_id').val(event.id);
   $('#update').html('Update');
   var url="{{url('Service/remove/')}}";
   $('#delete').attr('href',url+'/'+event.id);
   $('#dialog').dialog({
             title:'Edit Service',
             resizable: false,
             width:600,
             height:600,
             modal:true,
             show:{effect:'clip',duration:350},
             hide:{effect:'clip',duration:250},
           })


 },

 events:"{{route('allEvent')}}",
dayClick:function(date,event,view){
 $('#start').val(convert(date));
  $('#end').val(convert(date));
   $('#dialog').dialog({
     title:'Add Service',
     resizable: false,
     width:600,
     height:600,
     modal:true,
     show:{effect:'clip',duration:350},
     hide:{effect:'clip',duration:250},
   })


   }


})});
        
</script>
<script>
   
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
      
    
  </script>
  
    
    <script>
    
    function Monday(id) {
      var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
     
  if (  m.style.display == "none")//show none=hide
  {
      m.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {m.style.display = "none";}};
      
      
      
      function Tuesday(id) {
      var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  t.style.display == "none") {
      t.style.display = "block";  m.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {t.style.display = "none";}};
      function Wednesday(id) {
        var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  w.style.display == "none") {
      w.style.display = "block";  t.style.display = "none";m.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {w.style.display = "none";}};
      function Thursday(id) {
        var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  th.style.display == "none") {
      th.style.display = "block";  t.style.display = "none";w.style.display = "none";m.style.display = "none";f.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {th .style.display = "none";}};
      function Friday(id) {
        var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  f.style.display == "none") {
      f.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";m.style.display = "none";sa.style.display = "none";su.style.display = "none";} else {f.style.display = "none";}};
      function Saturday(id) {
        var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  sa.style.display == "none") {
      sa.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";m.style.display = "none";su.style.display = "none";} else {sa.style.display = "none";}};
  function Sunday(id) {
    var m= document.getElementById("Monday"+id);
      var t = document.getElementById("Tuesday"+id);
      var w = document.getElementById("Wednesday"+id);
      var th = document.getElementById("Thursday"+id);
      var f = document.getElementById("Friday"+id);
      var sa = document.getElementById("Saturday"+id);
      var su= document.getElementById("Sunday"+id);
  if (  su.style.display == "none") {
      su.style.display = "block";  t.style.display = "none";w.style.display = "none";th.style.display = "none";f.style.display = "none";sa.style.display = "none";m.style.display = "none";} else {su.style.display = "none";}};

    </script>
  @include('sweetalert::alert')
  
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> 

<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script> 
</body>

</html>