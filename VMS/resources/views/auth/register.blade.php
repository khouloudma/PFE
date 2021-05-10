
<!doctype html>
<html class="no-js" lang="zxx"><head>
   
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/icon/favicon.png">
    <script data-n-head="true" src=" https://cdn.subscribers.com/assets/subscribers.js"></script>
    <script data-n-head="true" src="//js.hs-scripts.com/19526622.js"></script>
    <link href="/_nuxt/27b1e8d8ff42c38e2085.js" as="script">
    <link  href="/_nuxt/607d7f5e9a59c99bd16e.js" as="script">
    <link  href="/_nuxt/61b01131aae48c245698.js" as="script">
    <link  href="/_nuxt/41f1a05cf6926672f174.js" as="script">
    <link href="/_nuxt/5493f8c163b93c321978.js" as="script">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

@extends('layouts.navbar')
<body>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Sign up</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="w-100" style="margin-bottom: auto;">
                            </div>
                            
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h2 class="mb-4">Sign up</h2>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form method="post" action="{{ route('pay') }}">
                        @csrf
 
                                <div class="form-group mb-3">
                                    <label class="label" for="name">{{ __('Full Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="name"required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="Company_name">{{ __('Company Name') }}</label>
                                    <input id="Company_name" type="text" class="form-control @error('Company_name') is-invalid @enderror" name="Company_name" value="{{ old('Company_name') }}" placeholder="Company_name"required autocomplete="Company_name" autofocus>

                                @error('Company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="Country">{{ __('Country') }}</label>
                                    <input id="Country" type="text" class="form-control @error('Country') is-invalid @enderror" name="Country" value="{{ old('Country') }}" placeholder="Country"required autocomplete="Country" autofocus>

                                @error('Country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="Phone_number">{{ __('Phone Number') }}</label>
                                    <input id="Phone_number" type="text" class="form-control @error('Phone_number') is-invalid @enderror" name="Phone_number" value="{{ old('Phone_number') }}" placeholder="Phone_number"required autocomplete="Phone_number" autofocus>

                                @error('Phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="name">{{ __('E-Mail Address') }}</label>
                                    <input id="email" placeholder="Adress E-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                              
                                <div class="form-group mb-3">
                                    <select name="Category_field" id="Category_field">
                                        <option value="" selected="selected" disabled="disabled" hidden="hidden">Category Field</option>
                                        <option value="Offices/Consultancies">Offices/Consultancies</option>
                                        <option value="Hospitals/Clinics">Hospitals/Clinics</option>
                                        <option value="Hotels/Lodges">Hotels/Lodges</option>
                                        <option value="Societies/Multi-tenant/buildings">Societies/Multi-tenant/buildings</option>
                                        <option value="Conferences/Events">Conferences/Events</option>
                                        <option value="Salons/Gyms">Salons/Gyms</option>
                                        <option value="Co-working">Co-working</option>
                                        <option value="Schools/Universities/Institutes">Schools/Universities/Institutes</option>
                                        <option value="Restaurants/Cafes">Restaurants/Cafes</option>
                                        <option value="Others">Others</option>
                                     </select>
                                </div><br><br><br>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"  placeholder="Password" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"placeholder="**************" name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div>
                                    <h2 class="mb-4">Choose your plan</h2>
                                    <select id="plan" name="plan" required="required" class="form-control" >
                                        <option value="45" selected="selected" >Starter
                                        </option>
                                        <option  value="100" >Premuim
                                        </option>
                                    </select>
                                </div><br><br>
                                <div class="form-group mb-3">
                                    <input type="checkbox" name="checkBox" required="required" checked="checked" > By creating an account you agree to our
                                    <a href="privacy" target="_blank" class="terms-Privacy" >Terms &amp; Privacy</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">{{ __('Register') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    @extends('layouts.footer')


<div id="back-top">
    <a class="wrapper" title="Go to Top" href="#">
        <div class="arrows-container">
            <div class="arrow arrow-one">
            </div>
            <div class="arrow arrow-two">
            </div>
        </div>
    </a>
</div>


<script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
<script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
<script src="./assets/js/popper.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>

<script src="./assets/js/owl.carousel.min.js"></script>
<script src="./assets/js/slick.min.js"></script>
<script src="./assets/js/jquery.slicknav.min.js"></script>

<script src="./assets/js/wow.min.js"></script>
<script src="./assets/js/jquery.magnific-popup.js"></script>
<script src="./assets/js/jquery.nice-select.min.js"></script>
<script src="./assets/js/jquery.counterup.min.js"></script>
<script src="./assets/js/waypoints.min.js"></script>

<script src="./assets/js/contact.js"></script>
<script src="./assets/js/jquery.form.js"></script>
<script src="./assets/js/jquery.validate.min.js"></script>
<script src="./assets/js/mail-script.js"></script>
<script src="./assets/js/jquery.ajaxchimp.min.js"></script>

<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/main.js"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
</body>

</html>