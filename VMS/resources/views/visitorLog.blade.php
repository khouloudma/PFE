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
Visitor  log
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css">


</head>

<body class="">
  <div class="wrapper ">
  <div class="sidebar" data-color="white" style="  width:261px;
background-image: url('/assets/img/test.jpg')">     <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo"><a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Visitor log
        </a></div>
      <div class="sidebar-wrapper">
      <ul class="nav">
      @if(auth()->user()->role=='admin')
          <li class="nav-item   ">
            <a class="nav-link" href="home">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="visitor"  style="    width: 189px;">
              <i class="material-icons">person</i>
              <p>your entreprises</p>
            </a>
          </li>
          <li class="nav-item  ">
          <form  id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf</form>

            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="material-icons">library_books</i> <p> {{ __('Logout') }}</p></a>           
          </li>
          @else
          <li class="nav-item   ">
            <a class="nav-link" href="home">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item active ">
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
          <li class="nav-item ">
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
          @endif
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:;">Visitor Log</a>
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
                  <i class="material-icons">person</i><a>{{ auth()->user()->name }}</a>

                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="/profile">Profile</a>
                  <a class="dropdown-item" href="/profile">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><form  id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf</form><p> {{ __('Logout') }}</p></a>  </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      @if(auth()->user()->role=='admin')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-plain">
                <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Your entreprises </h4>
                  <p class="card-category"> Check daily entreprise's details</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" >
                      <thead class="thead-dark">
                     
                        <th>
                          Name
                        </th>
                        <th>
                          Phone number
                        </th>
                        <th>
                          Email adress
                        </th>
                        <th>
                          company name
                        </th>
                         <th>
                          Country
                        </th>
                        <th>
                          category field
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody class="thead-light">
                      @foreach($allusers as $user)
                        <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->Phone_number}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->Company_name}}</td>
                        <td>{{$user->Country}}</td>
                        <td>{{$user->Category_field}}</td>
                        <td><a href="javascript:void(0)"   onclick="openchoices({{$user->id}})"  class="btn1" >Edit</a></td><br>
                        <td><div class="fm-input "  style="display: none;" id="H{{$user->id}}">hehy</div></td>
                        <td><form action="/remove_user/{{$user->id}}" method="POST">
                              {{ method_field('POST') }}
                              @csrf
                               <input type="hidden" name="_method" value="POST">      
                                <button type="submit"  class="delete fm-close"   style="top: 20px;" onclick="return confirm('??tes-vous s??rs ?')"><i class="fa fa-remove"></i></button></form></td>
                      
                        </tr>
                      @endforeach
                    
                      </tbody> </table>
                      <center><button>Add new user Manually </button></center>
                  @else
                  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card card-plain">
                    <div class="card-header card-header-primary">
                  <h4 class="card-title mt-0"> Your visitors </h4>
                  <p class="card-category"> Check daily visitors details</p>
                </div>
                <div><a class='btn btn-danger' href="{{url('/pre_appointment')}}">Pre-appointment</a> <a class='btn btn-danger' href="{{url('/pre_appointment_checkin')}}">Pre-appointment checkin</a></div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id='list' class="table table-hover">
                      <thead class="">
                      <th>
                          Avatar
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Phone number
                        </th>
                        <th>
                          Email adress
                        </th>
                        @if(isset($parameter->enablefield1) &&($parameter->enablefield1=='on'))
                      
                        <th>
                        {{$parameter->field1}}
                        </th>
                        @endif                     
                        @if(isset($parameter->enablefield2) &&($parameter->enablefield2=='on'))
                        <th>
                        {{$parameter->field2}}
                        </th>
                        @endif             
                        @if(isset($parameter->enablefield3) &&($parameter->enablefield3=='on'))
                        <th>
                        {{$parameter->field3}}
                        </th>
                        @endif                     

                        <th>
                          Check-in
                        </th>
                         <th>
                          Check-out
                        </th>
                        <th>
                          Purpose
                        </th>
                        <th>
                          Action
                        </th>
                      </thead>
                      <tbody>
                    @if(isset($visitor))
                      @foreach($visitor as $vis)
                        <tr>
                        <td><img  style='width: 130px;height: 105px;' src="{{$vis->visitor_image}}" ></td>
                        <td>{{$vis->name}}</td>
                        <td>{{$vis->phone}}</td>
                        <td>{{$vis->email}}</td>
                        @if(isset($parameter->enablefield1) &&($parameter->enablefield1=='on'))

                        <td>
                        {{$vis->field1}}
                        </td>
                        @endif
                        @if(isset($parameter->enablefield2) &&($parameter->enablefield2=='on'))
                        <td>
                        {{$vis->field2}}
                        </td>
                        @endif
                        @if(isset($parameter->enablefield3) &&($parameter->enablefield3=='on'))
                        <td>
                        {{$vis->field3}}
                        </td>
                        @endif
                        <td>{{$vis->updated_at}}</td>
                        <td>Not yet</td>
                        <td>{{$vis->purpose}}</td>
                        <td><form action="/remove_visitor/{{$vis->id}}" method="POST">
                              {{ method_field('POST') }}
                              @csrf
                               <input type="hidden" name="_method" value="POST">      
                                <button type="submit"  class="btn btn-danger"    onclick="return confirm('??tes-vous s??rs ?')"><i class="fa fa-remove"></i></button></form>
                                <a href="#{{$vis->id}}" class="btn btn-outline-primary btn-floating" data-toggle="modal"> <i class="fa fa-magic"></i></a></td>
                        
                        </tr>
                      @endforeach
                    @endif
                      </tbody> 
                    </table>
                    <center><a href="#Addvisitor" data-toggle="modal" class="btn btn_0 btn-floating">Add visitor manually</a></center>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
  </div>
  @endif
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
        
      </ul>
    </div>
  </div>

  <!-- !----------Model edit visitor---------------! -->
  @foreach($visitor as $vis)

<div class="modal fade" id="{{$vis->id}}" >
  <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-image: url('images/this.jpg');">
          <div class="modal-header">
              <center><h3 class="modal-title">Edit</h3></center>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">??</span>
              </button>
          </div>
          <div class="modal-body">
          <form class="form-horizontal" enctype="multipart/form-data"  role="form" method="POST" action="/visitor_edit/{{$vis->id}}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" hidden='true'name="id" value="{{$vis->id}}">
                          <label class="label" for="name" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>Full Name</label>
                          <input type="text" class="form-control" name='name' id='name'placeholder="{{$vis->name}}" required>
                          @error('name')
                          <p style="color:red;">{{$message}}</p>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label class="label" for="phone" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>Phone number</label>
                          <input type="text" class="form-control" name='phone' id='phone' placeholder="{{$vis->phone}}" required>
                          @error('phone')
                          <p style="color:red;">{{$message}}</p>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label class="label" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;' for="email">Email Address</label>
                          <input type="text" class="form-control" id='email' name='email'placeholder="{{$vis->email}}" required>
                          @error('email')
                          <p style="color:red;">{{$message}}</p>
                          @enderror
                      </div>
                      @if(isset($parameter->enablefield1) && isset($parameter->requirefield1) && ($parameter->enablefield1=='on'))
                          @if($parameter->requirefield1=='on')
                      <div class="form-group">
                          <label class="label" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;' for="field1">{{$parameter->field1}}</label>
                          <input type="text" class="form-control" id='field1' name='field1'placeholder="{{$vis->field1}}" required>
                      </div>
                       @else
                      <div class="form-group">
                          <label class="label" for="field1" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;' >{{$parameter->field1}}</label>
                          <input type="text" class="form-control" id='field1' name='field1'placeholder="{{$vis->field1}}" >
                      </div>
                       
                        @endif
                      @endif
                      @if(isset($parameter->enablefield2) && isset($parameter->requirefield2) && ($parameter->enablefield2=='on'))
                          @if($parameter->requirefield2=='on')
                      <div class="form-group">
                          <label class="label" for="field2" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>{{$parameter->field2}}</label>
                          <input type="text" class="form-control" id='field2' name='field2'placeholder="{{$vis->field2}}" required>
                      </div>
                      @else
                      <div class="form-group">
                          <label class="label" for="field2" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>{{$parameter->field2}}</label>
                          <input type="text" class="form-control" id='field2' name='field2'placeholder="{{$vis->field2}}" >
                      </div>
                      
                        @endif
                      @endif
                      @if(isset($parameter->enablefield3) && isset($parameter->requirefield3) && ($parameter->enablefield3=='on'))
                        @if($parameter->requirefield3=='on')
                      <div class="form-group">
                          <label class="label" for="field3" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>{{$parameter->field3}}</label>
                          <input type="text" class="form-control" id='field3' name='field3'placeholder="{{$vis->field3}}" required>
                      </div>
                         @else
                      <div class="form-group">
                          <label class="label" for="field3"  style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>{{$parameter->field3}}</label>
                          <input type="text" class="form-control" id='field3' name='field3'placeholder="{{$vis->field3}}" >
                      </div>
                     
                        @endif
                      @endif

                      <div class="form-group">
                          <label class="label" for="purpose" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>Purpose</label>
                          <textarea  class="form-control" name='purpose' id="purpose" required>{{$vis->purpose}}</textarea>
                          @error('purpose')
                          <p style="color:red;">{{$message}}</p>
                          @enderror
                      </div>
                  </div>
          <div class="modal-footer">
              <button type="submit"  class="btn btn_0 btn-floating">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div></form>
      </div>
  </div>
</div>
  @endforeach
  <!-- !----------Model add visitor---------------! -->
  <input type="text" hidden='true'>
  @foreach($visitor as $vis)

<div class="modal fade" id="Addvisitor" >
  <div class="modal-dialog" role="document">
      <div class="modal-content" style="background-image: url('images/this.jpg');">
          <div class="modal-header">
              <center><h3 class="modal-title">Add visitor</h3></center>

              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">??</span>
              </button>
          </div>
          <div class="modal-body">
          <form class="form-horizontal" enctype="multipart/form-data"  role="form" method="POST" action="/visitor_add">
                    {{ csrf_field() }}
                    <div class="form-group">
                          <label class="label" for="name" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>Full Name</label>
                          <input type="text" class="form-control" name='name' id='name'placeholder="exp:Johndoe" required>
                          @error('name')
                          <p style="color:red;">{{$message}}</p>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label class="label" for="phone" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>Phone number</label>
                          <input type="text" class="form-control" name='phone' id='phone' placeholder="exp:216 97 242 311" required>
                          @error('phone')
                          <p style="color:red;">{{$message}}</p>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label class="label" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;' for="email">Email Address</label>
                          <input type="text" class="form-control" id='email' name='email'placeholder="exp:Johndoe@gmail.com" required>
                          @error('email')
                          <p style="color:red;">{{$message}}</p>
                          @enderror
                      </div>
                      @if(isset($parameter->enablefield1) && isset($parameter->requirefield1) && ($parameter->enablefield1=='on'))
                        @if($parameter->requirefield1=='on')
                      <div class="form-group">
                          <label class="label" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;' for="field1">{{$parameter->field1}}</label>
                          <input type="text" class="form-control" id='field1' name='field1'placeholder="{{$parameter->field1}}" required>
                      </div>
                       @else
                      <div class="form-group">
                          <label class="label" for="field1" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;' >{{$parameter->field1}}</label>
                          <input type="text" class="form-control" id='field1' name='field1'placeholder="{{$parameter->field1}}" >
                      </div>
                      @endif
                      @endif
                      @if(isset($parameter->enablefield2) && isset($parameter->requirefield2) && ($parameter->enablefield2=='on'))
                      @if($parameter->requirefield2=='on')
                      <div class="form-group">
                          <label class="label" for="field2" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>{{$parameter->field2}}</label>
                          <input type="text" class="form-control" id='field2' name='field2'placeholder="{{$parameter->field2}}" required>
                      </div>
                      @else
                      <div class="form-group">
                          <label class="label" for="field2" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>{{$parameter->field2}}</label>
                          <input type="text" class="form-control" id='field2' name='field2'placeholder="{{$parameter->field2}}" >
                      </div>
                      @endif
                      @endif
                      @if(isset($parameter->enablefield3) && isset($parameter->requirefield3) && ($parameter->enablefield3=='on'))
                      @if($parameter->requirefield3=='on')
                      <div class="form-group">
                          <label class="label" for="field3" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>{{$parameter->field3}}</label>
                          <input type="text" class="form-control" id='field3' name='field3'placeholder="{{$parameter->field3}}" required>
                      </div>
                      @else
                      <div class="form-group">
                          <label class="label" for="field3"  style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>{{$parameter->field3}}</label>
                          <input type="text" class="form-control" id='field3' name='field3'placeholder="{{$parameter->field3}}" >
                      </div>
                      @endif
                      @endif
                      <div class="form-group">
                          <label class="label" for="purpose" style='color: black;margin-top: -10px;font-size: medium;font-family: unset;'>Purpose</label>
                          <textarea  class="form-control" name='purpose' id="purpose" placeholder="purpose" required></textarea>
                          @error('purpose')
                          <p style="color:red;">{{$message}}</p>
                          @enderror
                      </div>
                  </div>
          <div class="modal-footer">
              <button type="submit"  class="btn btn_0 btn-floating">Add</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div></form>
      </div>
  </div>
</div>
@endforeach
<div class="visible-print text-center">
     

</div>
  <!--   end add visitor model   -->

  <!--   Core JS Files   -->
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
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> 

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script> 
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script> 

  <script>
         function openchoices(idwd) {
                  var x = document.getElementById("H"+idwd);
                      if (x.style.display == "block") {
                          x.style.display = "none";} 
                      else {x.style.display = "block";}};

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
                  ' ???'+pageTotal // +' ( ???'+ total + ')' ouput the total of all pages //
                );
            }
        } );
    } );


  </script>
</body>

</html>