<!doctype html>
<html lang="en">
<head>
    <title>Pre-Appointment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/stylecheckin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
   

</head>
<body>
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
                            <input type="text" class="form-control" name='name' id='name'placeholder="John Doe" required>
                            @error('name')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="label" for="phone">Phone number</label>
                            <input type="text" class="form-control" name='phone' id='phone' placeholder="216 93 887 912" required>
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
                        @endif
                        <div class="form-group">
                            <label class="label" for="purpose">Purpose</label>
                            <textarea  class="form-control" name='purpose' id="purpose" required></textarea>
                            @error('purpose')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
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
                       
                        <div class="form-group">
                        <label for="service">Choose a service:</label>
                           <center> <select id="service" name="service">
                            @foreach($services as $ser)
                            <option class="form-control" style="width: 304px;height: 43px;" value="{{$ser->id}}">{{$ser->title}}</option>
                            @endforeach
                            </select></center>
                        </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

<script src="js/main.js"></script>

</body>
</html>

