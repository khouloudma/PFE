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
                    <center><h3 style=" margin-top: -37px;">Welcome dear Visitor</h3></center>
                 

                    <form method="POST" enctype="multipart/form-data"  action="/checkinadd" class="signup-form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
                            </div></center></div>@endif
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
                        <div class="form-group">
                            <label class="label" for="purpose">Purpose</label>
                            <textarea  class="form-control" name='purpose' id="purpose" required></textarea>
                            @error('purpose')
                            <p style="color:red;">{{$message}}</p>
                            @enderror
                        </div>
                        <input type="text" hidden='true' name="id_user" id='id_user' value='{{auth()->user()->id }}'>
                      
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

