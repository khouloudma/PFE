<!doctype html>
<html lang="en">
<head>
    <title>Pre-Appointment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/stylecheckin.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="crossorigin="anonymous"></script>
    <script src="../assets/js/core/popper.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('css/fullcalendar.css') }}" />

</head>
<body>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Services Calendar</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <script src="{{  URL::asset('js/fullcalendar.js') }}"></script>
      <script>
      


 
 
      $(document).ready(function() {
var calendar = $('#calendar').fullCalendar({
 // put your options and callbacks here
 selectable: true,
 height: "auto",
 showNonCurrentDates: true,
 editable:true,
 defaultView: 'month',
 
 displayEventTime: false,

 yearColumns: 3,
 timezone: 'local',
 selectHelper: true,
 header: {
   left: 'prev,next today',
   center: 'title,state',
   right: 'year,month,basicWeek,basicDay'

 },
 events:"{{route('allEvent')}}",


});

   
        });
      
</script>

                                <div class="container">
                                    <div id="calendar">
                                    </div>
                                </div>
                         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10">
                <div class="login-wrap p-4 p-md-5">
                    <center><h2 style=" margin-top: -37px;">Book An Appointment</h2>
                    <p class="card-category">Please enter your details to book an appointment</p></center>


                    <form method="POST" enctype="multipart/form-data"  action="/appointment" class="signup-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   
                        <div class="form-group">
                            <label class="label" for="name">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="John Doe" required>
                            @error('name')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label" for="phone">Phone number</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="216 93 887 912" required>
                            @error('phone')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>    
                        <div class="form-group">
                            <label class="label" for="email">Email Address</label>
                            <input type="text" class="form-control" id='email' name='email'placeholder="johndoe@gmail.com" required>
                            @error('email')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        @if(isset($parameter->enablefield1))
                        @if($parameter->enablefield1=='on')
                          @if($parameter->requirefield1=='on')
                        <div class="form-group">
                            <label class="label" for="field1">{{$parameter->field1}}</label>
                            <input type="text" class="form-control" id='field1' name='field1'placeholder="{{$parameter->field1}}" required>
                        </div>
                         @else
                        <div class="form-group">
                            <label class="label" for="field1">{{$parameter->field1}}</label>
                            <input type="text" class="form-control" id='field1' name='field1'placeholder="{{$parameter->field1}}" >
                        </div>
                        @endif
                        @endif
                        @endif
                        @if(isset($parameter->enablefield2))
                        @if($parameter->enablefield2=='on')
                        @if($parameter->requirefield2=='on')
                        <div class="form-group">
                            <label class="label" for="field2">{{$parameter->field2}}</label>
                            <input type="text" class="form-control" id='field2' name='field2'placeholder="{{$parameter->field2}}" required>
                        </div>
                        @else
                        <div class="form-group">
                            <label class="label" for="field2">{{$parameter->field2}}</label>
                            <input type="text" class="form-control" id='field2' name='field2'placeholder="{{$parameter->field2}}" >
                        </div>
                        @endif
                        @endif
                        @endif
                        @if(isset($parameter->enablefield3))
                        @if($parameter->enablefield3=='on')
                        @if($parameter->requirefield3=='on')
                        <div class="form-group">
                            <label class="label" for="field3">{{$parameter->field3}}</label>
                            <input type="text" class="form-control" id='field3' name='field3'placeholder="{{$parameter->field3}}" required>
                        </div>
                        @else
                        <div class="form-group">
                            <label class="label" for="field3">{{$parameter->field3}}</label>
                            <input type="text" class="form-control" id='field3' name='field3'placeholder="{{$parameter->field3}}" >
                        </div>
                        @endif
                        @endif
                        @endif <div class="form-group">
                            <label class="label" for="purpose">Purpose</label>
                            <textarea  class="form-control" name='purpose' id="purpose" required></textarea>
                            @error('purpose')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                        <label for="service">Choose a service:</label>
                           <center> <select id="service" name="service">
                            @foreach($services as $ser)
                            <option class="form-control" style="width: 304px;height: 43px;" value="{{$ser->id}}">{{$ser->title}}</option>
                            @endforeach
                            </select> <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Show calendar</button>
                                        </center>

                        </div>
                                
                      
                        <!-- start date -->
                        <div class="form-group">
                            <label class="label" for="start">Start date</label>
                           <center><input type="datetime-local" name="start" id="start"></center>
                        </div>                    
                        <!-- start date -->
                        <!-- end date -->
                        <div class="form-group">
                            <label class="label" for="end">end date</label>
                           <center><input type="datetime-local" name="end" id="end"></center>
                        </div>                    
                        <!-- end date -->
                       
                     
                        <input type="text" hidden='true' name="id_user" id='id_user' value='{{auth()->user()->id }}'>
                      
                        <div class="form-group d-flex justify-content-end mt-5">
                                 <button type="submit" class="btn btn-primary submit"><span class="fa fa-paper-plane"></span></button>     
                     </div>
                     </form>
                        </div>
                        <a href="/home">dashboard</a>
                </div>
            </div>
        </div>
</section>
@include('sweetalert::alert')


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<script src="js/main.js"></script>

</body>
</html>

