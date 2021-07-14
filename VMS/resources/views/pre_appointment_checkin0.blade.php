<!doctype html>
<html lang="en">
<head>
    <title>CHECK IN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/stylecheckin.css">
<style>canvas,
video {
   
    background-color: transparent;
    border-radius: 155px;
    width: 296px;
    height: 222px;
}</style>
</head>
<body>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-10">
                <div class="login-wrap p-4 p-md-5">
                    <center><h3 style=" margin-top: -37px;">Welcome !</h3></center>
                 

                    <form method="POST" enctype="multipart/form-data"  action="/pre_appointment_checkin_add" class="signup-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    

                    @if(isset($parameter->requireCapture))
                   @if($parameter->requireCapture=='on') <div class="form-group">
                        <center><div id="wrapper">
                            <video  ></video>
                            <canvas></canvas>
                            <br />
                            <button  class="btn btn_0 btn-floating" id="newphoto">Take A Photo</button>
                            <input type="text" hidden='true' value="nothing" id='visitor_image' name='visitor_image'>
                            @error('visitor_image')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                            </div></center></div>@endif @endif
                        
                        <input type="text" hidden='true' name="id_vistor" id='id_visitor' value='{{$visitor->->id }}'>
                        <input type="datetime" name="checkin" id="checkin" <?php 

$currentDateTime = date('Y-m-d H:i:s');
echo "value='$currentDateTime''";?> hidden="true">
                        <div class="form-group d-flex justify-content-end mt-5">
                                 <button type="submit" class="btn btn-primary submit"><span class="fa fa-paper-plane"></span></button>                        </div>

                     </form>
                        </div>
                        <a href="/home">dashboard</a>
                </div>
            </div>
        </div>
</section>
<script>var messageArea = null,
  wrapperArea = null,
  btnNewPhoto = null,
  btnDownload = null,
  videoCamera = null,
  canvasPhoto = null;

function init() {
  wrapperArea = document.querySelector("#wrapper");
  btnNewPhoto = document.querySelector("#newphoto");
  videoCamera = document.querySelector("video");
  canvasPhoto = document.querySelector("canvas");
  canvasPhoto.style.display = "none";
  navigator.mediaDevices.getUserMedia({
    video: true
  })
    .then(function (stream) {
      if ("srcObject" in videoCamera) {
        videoCamera.srcObject = stream;
      } else {
        videoCamera.src = window.URL.createObjectURL(stream);
      }

      wrapperArea.style.display = "block";
      btnNewPhoto.onclick = takeAPhoto;

      videoCamera.onloadedmetadata = function () {
        videoCamera.setAttribute("width", this.videoWidth);
        videoCamera.setAttribute("height", this.videoHeight);
        canvasPhoto.setAttribute("width", this.videoWidth);
        canvasPhoto.setAttribute("height", this.videoHeight);
        videoCamera.play();
      };
    })
    
};

function takeAPhoto() {
    canvasPhoto.style.display = "block";
   var bannerImage = canvasPhoto.getContext("2d").drawImage(videoCamera, 0, 0, videoCamera.width, videoCamera.height);
    let dataURL =canvasPhoto.toDataURL("image/png");
    document.getElementById('visitor_image').value =dataURL;
    console.log( document.getElementById('visitor_image').value);
  videoCamera.style.display = "none";

};


window.onload = init;</script>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>

