<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
Calender  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <link href="../assets/demo/demo.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/fullcalendar.css') }}" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
<meta name="csrf-token" content="{{ csrf_token() }}" />
  <!--   Core JS Files   -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="crossorigin="anonymous"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.js"></script>
  <script src="{{  URL::asset('js/fullcalendar.js') }}"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> 
  <style>
    #dialog{
      display:none;
    }
  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a  class="simple-text logo-normal">
Calendar        </a></div>
      <div class="sidebar-wrapper">
      <ul class="nav">
          <li class="nav-item  ">
            <a class="nav-link" href="home">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item  ">
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
          <li class="nav-item active">
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
          <li class="nav-item ">
            <a class="nav-link" href="">
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
            <a class="navbar-brand" href="javascript:;">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
      
              <div class="input-group no-border">
                  <div class="ripple-container"></div>
              </div>
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
                  <i class="material-icons">person</i><a> {{ auth()->user()->name }}</a>

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
      <div class="content">    
        <div class="container">
                    <br />
                    <br />
          <div id="calendar"></div>
         </div>
     </div>     
      <!-- event dialog start -->
      <div id='dialog' class="modal" >
        <div id='dialog-body'>
          <form id='dayClick' method="post" action="{{route('eventStore')}}">
            @csrf
            <div class='form-group'>
              <label>Title</label>
              <input type="text" class='form-group' name='title' placeholder='Service title'>
            </div>
            <div class='form-group'>
              <label>Start Date/Time:</label>
              <input type="text" class='form-group' id="start" name='start' placeholder='Start date & time'>
            </div>
            <div class='form-group'>
              <label>End Date/Time</label>
              <input type="text" class='form-group' name='end' id="end" placeholder='End date & time'>
            </div>
            <div class='form-group'>
              <label>All Day</label>
              <input type="checkbox" value="1" name="AllDay">All Day
              <input type="checkbox" value="0" name="AllDay">Partial

            </div>
            <div class='form-group'>
              <label>Background Color</label>
              <input type="color" class='form-group' name='color' >
            </div>
            <div class='form-group'>
              <label>Text Color</label>
              <input type="color" class='form-group' name='textColor' >
            </div>
            <div class='form-group'>
              <button class='btn btn-success' type="submit">Add service</button>
            </div>
          </form>
        </div>
      </div>
      <!-- End of event dialog -->

     
     <script>
$(document).ready(function() {
  function convert(str){
    const d= new Date(str);
    let month= '' +(d.getMonth() + 1);
    let day= '' + d.getDate();
    let year= d.getFullYear();
    if(month.length < 2) month ='0' + month;
    if(day.length < 2) day ='0' + day;
    let hour= '' + d.getUTCHours();
    let minutes= '' + d.getUTCMinutes();
    let seconds= '' + d.getUTCSeconds();
    if(hour.length < 2) hour ='0' + hour;
    if(minutes.length < 2) minutes ='0' + minutes;
    if(seconds.length < 2) seconds ='0' + seconds;
    return[year,month,day].join('-')+' '+[hour,minutes,seconds].join(':');





  }
  var bootstrapButton = $.fn.button.noConflict() // return $.fn.button to previously assigned value
$.fn.bootstrapBtn = bootstrapButton      
// page is now ready, initialize the calendar...

var calendar = $('#calendar').fullCalendar({
  // put your options and callbacks here
  selectable: true,
  height: "auto",
  showNonCurrentDates: false,
  editable:false,
  defaultView: 'month',
  yearColumns: 3,
  timezone: 'local',
  selectHelper: true,



  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'year,month,basicWeek,basicDay'

  },
  select:function(start, end, allDay)
        {
          $('#start').val(convert(start));
          $('#end').val(convert(end));
          $('#dialog').dialog({
              title:'Add Service',
              resizable: false,
              width:600,
              height:600,
              modal:true,
              show:{effect:'clip',duration:350},
              hide:{effect:'clip',duration:250},
            })

           
        },
  events:"{{route('allEvent')}}",
 dayClick:function(date,event,view){
  $('#start').val(convert(date));
   $('#end').val(convert(date));
    $('#dialog').dialog({
      title:'Add Service',
      resizable: false,
      width:600,
      height:600,
      modal:true,
      show:{effect:'clip',duration:350},
      hide:{effect:'clip',duration:250},
    })


    }


})});
</script>
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
      
    $(document).ready(function() {
        $('#list').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;
 
                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };
 
                // Total over all pages
                total = api
                    .column( 3 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
 
                // Total over this page
                pageTotal = api
                    .column( 3, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
 
                // Update footer
                $( api.column( 3 ).footer() ).html(
                  ' ₱'+pageTotal // +' ( ₱'+ total + ')' ouput the total of all pages //
                );
            }
        } );
    } );
  </script>
  @include('sweetalert::alert')

</body>

</html>