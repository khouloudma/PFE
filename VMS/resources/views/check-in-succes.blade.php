<!doctype html>
<html lang="en">
<head>
    <title>{{auth()->user()->name}}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/stylecheckin.css">


</head>
<body>
<script src="js/print.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/print.min.css">

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10">
                <div class="login-wrap p-4 p-md-5">
                <script>
                        function printContent(){
                            printJS({
                        printable: 'div1', 
                        type: 'html', 
                        targetStyles: ['*'],
                        style: '.modal-header { color: red; width: 100px; } .modal-body { width:100% }'
                                               })
                        }
                        </script>
                    <center><h1>Dear {{$visitor->name}} you'are checked in succesfully </h1></center>
                    <br><br><br>
                        @if($parameter->requirePrinter=='on')
                            <!-- card of bagde front if capture is activated  -->
                            <center><div class="card mb-3" style="max-width: 540px;" id="div1">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                    <img src="{{$visitor->visitor_image}}" style="    border-top-right-radius: 30px;border-bottom-left-radius: 30px;width: 160px;margin-left: 23px;margin-top: 72px;height: 145px;">
                                    </div>
                                    <div class="col-md-8">
                                    <img src="\images\logo.png" style="    width: 151px;margin-left: 179px;height: 38px;"> 

                                    <div class="card-body" style="text-align: -webkit-left;">
                                        <h2 class="card-title" style="ment.style { margin-left: -99px;margin-top: -37px;">Visitor bagde</h2>                                   
              
                                        <h6 class="card-text">Name : {{$visitor->name}}</h6>
                                        <h6 class="card-text">Phone : {{$visitor->phone}}</h6>
                                        <h6 class="card-text">Email : {{$visitor->email}}</h6>
                                        <h6 class="card-text">Purpose : {{$visitor->purpose}}</h6>

                                        <p class="card-text"><small class="text-muted">this bagde is valid for one day  created at :{{$visitor->created_at}}</small></p>
                                    </div>
                                    </div>
                                </div>
                            </div></center>

                            <!-- card of bagde front -->
                           <center> <button class="btn btn_0 btn-floating" onclick="printContent()" >Print your bagde</button></center>
                          <br><br><br>@endif
                        <a href="/home">dashboard</a>
                      
                </div>
            </div>
        </div>
</section>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

