
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
 
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link href="../css/toggle.css" rel="stylesheet" />

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
          Welcome
        </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item ">
            <a class="nav-link" href="home">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
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
          <li class="nav-item ">
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
          <li class="nav-item active" style="    width: 189px;">
            <a class="nav-link" href="/forms">
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
            <a class="navbar-brand" href="javascript:;">Customized your Forms</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
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
                  <i class="material-icons">person</i><a> {{ auth()->user()->name }}
</a>

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
      <script>function openchoices1(id) {
                  var x = document.getElementById("K"+id);
                  var y = document.getElementById("first");

                 if (    x.style.display == "block") {
                 x.style.display = "none";  y.style.display = "block";} else {x.style.display = "block";y.style.display = "none";}};
                 function openchoices2(id) {
                  var x = document.getElementById("B"+id);
                  var y = document.getElementById("second");

                 if (    x.style.display == "block") {
                  x.style.display = "none";  y.style.display = "block";} else {x.style.display = "block";y.style.display = "none";}};
                 function openchoices3(id) {
                  var x = document.getElementById("C"+id);
                  var y = document.getElementById("third");

                 if (    x.style.display == "block") {
                  x.style.display = "none";  y.style.display = "block";} else {x.style.display = "block";y.style.display = "none";}};
      </script>
      <center><h2>Add Custom Fields</h2></center>
      <center><h4>Description to add custom fields</h4></center>
    <center>  <div style="    width: 528px;">
    <style>.close {
  cursor: pointer;
  position: absolute;
  top: 50%;
  right: 0%;
  padding: 12px 16px;
  transform: translate(0%, -50%);
}

.close:hover {background: #bbb;}</style>
<script>
/* Get all elements with class="close" */
var closebtns = document.getElementsByClassName("close");
var i;

/* Loop through the elements, and hide the parent, when clicked on */
for (i = 0; i < closebtns.length; i++) {
  closebtns[i].addEventListener("click", function() {
    this.parentElement.style.display = 'none';
  });
}
</script>
      <form method="POST" enctype="multipart/form-data"  action="/parametrage" class="signup-form">
           @csrf
            <ul class="list-group"> 
           <li class="list-group-item list-group-item-light">
            <div class="form-group">
              <label style="color:black;"class="label" for="name">Print bagde</label>
              <label for="required"></label><input  type="checkbox" name="requirePrinter" id="requirePrinter"  <?php if (isset($parameter->requirePrinter) && ($parameter->requirePrinter=="on"))echo 'checked'?> data-toggle="toggle" data-size="sm">
           </div>
        </li>
        <li class="list-group-item list-group-item-light">
            <div class="form-group">
              <label style="color:black;"class="label" for="name">camera capture</label>
              <label for="required"></label><input name="requireCapture" id="requireCapture"  type="checkbox" <?php if (isset($parameter->requireCapture) &&($parameter->requireCapture=="on"))echo 'checked'?> data-toggle="toggle" data-size="sm">

           </div>
        </li>
      <li class="list-group-item list-group-item-light">
            <div class="form-group">
              <label style="color:black;"class="label" for="name">Name field:</label>
              <input style="width: fit-content;" type="text" class="form-control"  placeholder="Full Name" disabled>
           </div>
           
        </li>
        <li class="list-group-item list-group-item-light">
            <div class="form-group">
              <label style="color:black;"class="label" for="name">Phone field:</label>
              <input style="width: fit-content;" type="text" class="form-control" placeholder="Phone number" disabled>
           </div>
           
        </li>
        <li class="list-group-item list-group-item-light">
            <div class="form-group">
              <label style="color:black;"class="label" for="name">Email field:</label>
              <input style="width: fit-content;" type="text" class="form-control" name='mail' id='mail' placeholder="Email adress" disabled>
           </div>
        </li>
        <li id="first" name="first" class="list-group-item"><a class="btn_0" onclick="openchoices1({{auth()->user()->id}})">+Add More</a>
        </li>
        <div class="fm-input "  style="display: none;" id="K{{auth()->user()->id}}"> 
          <li class="list-group-item list-group-item-light">
            <div class="form-group">
              <label style="color:black;"class="label" for="name">Give this field a name</label>
              <input style="width: fit-content;" type="text" class="form-control" name='field1' id='field1'  <?php if (isset($parameter->field1) &&($parameter->field1=="on"))echo 'value="{{$parameter->field1}}"' ?> >
           </div>
            <div>  
                <label for="requirefield1">required</label><input  name="requirefield1" <?php if (isset($parameter->requirefield1) &&($parameter->requirefield1=="on"))echo 'checked'?> id="requirefield1" type="checkbox"  data-toggle="toggle" >
                <label for="enablefield1">enable</label><input   <?php if (isset($parameter->enablefield1) &&($parameter->enablefield1=="on"))echo 'checked'?> id="enablefield1" name="enablefield1"type="checkbox"  data-toggle="toggle" >
            </div>
            <li name="second" id="second" class="list-group-item">
              <a onclick="openchoices2({{auth()->user()->id}})" class="btn_0">+Add More</a>
              </li>
          </li>
        </div>
        <div class="fm-input "  style="display: none;" id="B{{auth()->user()->id}}"> 
          <li class="list-group-item list-group-item-light">
            <div class="form-group">
              <label style="color:black;"class="label" for="name">Give this field a name</label>
              <input style="width: fit-content;" type="text" class="form-control" name='field2' id='field2'  <?php if (isset($parameter->field2) && ($parameter->field2=="on"))echo 'value="{{$parameter->field2}}"' ?> >
           </div>
            <div>
                <label for="requirefield2">required</label><input  name="requirefield2" id="requirefield2" type="checkbox" <?php if (isset($parameter->requirefield2) &&($parameter->requirefield2=="on"))echo 'checked'?> data-toggle="toggle" data-size="sm">
                <label for="enablefield2">enable</label><input name="enablefield2" id="enablefield2"type="checkbox"  <?php if (isset($parameter->enablefield2) && ($parameter->enablefield2=="on"))echo 'checked'?> data-toggle="toggle" data-size="sm">
            </div>
            <li id="third" name="third"class="list-group-item">
              <a class="btn_0" onclick="openchoices3({{auth()->user()->id}})">+Add More</a>
            </li>
          </li>
        </div>
        <div class="fm-input "  style="display: none;" id="C{{auth()->user()->id}}"> 
          <li class="list-group-item list-group-item-light">
            <div class="form-group">
              <label style="color:black;"class="label" for="name">Give this field a name</label>
              <input style="width: fit-content;" type="text" class="form-control" name='field3' id='field3'  <?php if (isset($parameter->field3) &&($parameter->field3=="on"))echo 'value="{{$parameter->field3}}"' ?> >
           </div>
            <div>
                <label for="requirefield3">required</label><input  <?php if (isset($parameter->requirefield3) &&($parameter->requirefield3=="on"))echo 'checked'?> name="requirefield3" id="requirefield3" type="checkbox"  data-toggle="toggle" data-size="sm">
                <label for="enablefield3">enable</label><input  <?php if (isset($parameter->enablefield3) && ($parameter->enablefield3=="on"))echo 'checked'?>  id="enablefield3" name="enablefield3"type="checkbox"  data-toggle="toggle" data-size="sm" >
            </div>
          </li>
        </div>            <button  class="btn_0" >Save</button>

       </ul></form>
      </div></center>
    
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->

      </ul>
    </div>
  </div>
  
  <!--   Core JS Files   -->
  <script src="../js/toggle.js"></script>
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Plugin for the momentJs  -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
  <!-- Library for adding dinamically elements -->
  <script src="../assets/js/plugins/arrive.min.js"></script>
  <!--  Google Maps Plugin    -->
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
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
  <script>
    $(document).ready(function() {
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
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>
    @include('sweetalert::alert')

</body>

</html>


