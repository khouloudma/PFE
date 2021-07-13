
<!doctype html>
<html lang="en">
<head>
    <title>CHECK OUT</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/stylecheckin.css">

</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10">
            @if(Session::has('failure'))

<div class="alert alert-success" role="alert"> <center>

<strong> Failure: </strong>  {{ Session::get('failure') }}
</center>
</div>

@endif
                <div class="login-wrap p-4 p-md-5">
                    <center><h2>Glad to have you in our entrepise</h2></center>
                    <br><br><br>

                    <form method="POST"  enctype="multipart/form-data"  action="/checkoutsucess" class="signup-form">
                    {{ csrf_field() }}

                        <div class="form-group"><br>
                            <label class="label" for="preview" style="font-size: 23px;">Scan your Qr code:</label>
                          <center>  <video id="preview" width="100%"></video></center>

                        </div>
   
                            <div class="col-md-6" >
                                <input  hidden="true"type="text"  name="text" id="text" readonyy="" placeholder="scan qrcode" class="form-control"  >                         </div>
                               
                                <div class="form-group d-flex justify-content-end mt-5">
                                <button type="submit" class="btn btn-primary submit"><span
                                        class="fa fa-paper-plane"></span></button>
                            </div>
<br>       
                            <h2 class="mb-5" style="    margin-left: 396px;color: #ffffff;">Hope you come back soon ! </h2>

                            </form>
                            
                        </div>
                        <div class="result"></div>

                        <a href="/home">dashboard</a>
                </div>
            </div>
        </div>
</section>
<script>

           let scanner = new Instascan.Scanner({ video: document.getElementById('preview')});
           Instascan.Camera.getCameras().then(function(cameras){
               if(cameras.length > 0 ){
                   scanner.start(cameras[0]);
               } else{
                   alert('No cameras found');
               }

           }).catch(function(e) {
               console.error(e);
           });

           scanner.addListener('scan',function(c){
               document.getElementById('text').value=c;
           });

           </script>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
