<!doctype html>
<html lang="en">
<head>
    <title>CHECK IN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/stylecheckin.css">

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

                        <div class="form-group">
                            <label class="label" for="name">Full Name</label>
                            <input type="text" class="form-control" name='name' id='name'placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label class="label" for="phone">Phone number</label>
                            <input type="text" class="form-control" name='phone' id='phone' placeholder="+216 93 887 912" required>
                        </div>
                        <div class="form-group">
                            <label class="label" for="email">Email Address</label>
                            <input type="text" class="form-control" id='email' name='email'placeholder="johndoe@gmail.com" required>
                        </div>
                        <div class="form-group">
                            <label class="label" for="purpose">Purpose</label>
                            <textarea  class="form-control" name='purpose' id="purpose" required></textarea>
                        </div>
                      
                        
                        <div class="form-group">
                            <label class="label" for="capture">capture</label>
                            <input type="file" accept="image/*" name='capture' id="capture" capture="camera" class="form-control">
                        <div class="form-group d-flex justify-content-end mt-5">
                                 <button type="submit" class="btn btn-primary submit"><span class="fa fa-paper-plane"></span></button>                        </div>


                     </form>
                        </div>
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

