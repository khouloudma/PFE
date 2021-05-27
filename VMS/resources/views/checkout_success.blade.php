<!doctype html>
<html lang="en">
<head>
    <title>CHECK OUT</title>
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
                    <center><h1>Dear {{$visitor->name}} you'are checked in succesfully </h1></center>
                    <br><br><br>
                    <div class="border p-3 rounded">
                    <form  method='post' enctype="multipart/form-data"  action="/feedback">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="row">
                            <div class="col-md-3"><label class="radio"> <input type="radio" name="experience"
                                                                              id='experience' value="Bad Experience"> <span>Bad Experience</span>
                                </label></div>
                            <div class="col-md-3"><label class="radio"> <input type="radio" name="experience"
                                                                                id='experience' value="Good Experience"> <span>Good Experience</span>
                                </label></div>
                            <div class="col-md-3"><label class="radio"> <input type="radio" name="experience"
                                                                                id='experience' value="Great Experience"> <span>Great Experience</span>
                                </label></div>
                            <div class="col-md-3"><label class="radio"> <input type="radio" name="experience" id='experience'
                                                                               value="Amazing Experience"> <span>Amazing Experience</span>
                                </label></div>
                        </div>
                        <input type="text" value='{{$visitor->id}}' name='id_vistor' id='id_vistor' hidden='true'>
                        <div class="mt-4"><textarea class="area form-control" rows="7" name="comment" id="comment"
                                                    placeholder="add comments"> </textarea></div>
                        <div class="button mt-4 text-right">
                            <button class="btn btn-success submit-button">Submit</button>
                        </div>
                    </div>
                    </form>
                    <style>.icon i {
                            font-size: 25px;
                            color: #2196F3
                        }

                        label.radio {
                            cursor: pointer;
                            width: 100% !important;
                            margin-top: 9px
                        }

                        label.radio input {
                            position: absolute;
                            top: 0;
                            left: 0;
                            visibility: hidden;
                            pointer-events: none;
                            width: 100%
                        }

                        label.radio span {
                            padding: 7px 14px;
                            border: 1px solid #D32F2F;
                            display: inline-block;
                            color: #D32F2F;
                            border-radius: 3px;
                            box-shadow: 3px 5px 8px 2px #e9ecef;
                            width: 100%;
                            align-items: center
                        }

                        label.radio input:checked + span {
                            border-color: #D32F2F;
                            background-color: #D32F2F;
                            color: #fff
                        }

                        .area {
                            resize: none
                        }

                        .area:focus {
                            box-shadow: none;
                            border-color: #D32F2F !important
                        }

                        .submit-button,
                        .submit-button:active,
                        .submit-button:visited,
                        .submit-button:focus {
                            background-color: #D32F2F !important;
                            border-color: #D32F2F !important;
                            color: #fff !important;
                            box-shadow: none;
                            text-transform: uppercase;
                            padding-left: 35px;
                            padding-right: 35px
                        }

                        .submit-button:hover {
                            background-color: #D32F2F !important;
                            border-color: #D32F2F !important
                        }</style>

                    <br><br><br>
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