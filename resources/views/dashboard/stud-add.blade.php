<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>student-add</title>
    <!-- Scripts -->
    <script src="{{ asset('js/dashboard/jquery-1.11.1.min.js') }}" defer></script>
<script src="{{ asset('js/dashboard/bootstrap.js') }}" defer></script>
    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="{{ asset('css/dashboard/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/css/font-awesome.min.css') }}">

</head>
<style>
    body{
      background-image:linear-gradient(#7685bb 50%,#f5f5f5 50%);
      background-repeat: no-repeat;
      background-size: cover;
      font-family: 'Tajawal', sans-serif;
      
  }
      
  
  .navbar {
     padding-top: 5px;
     background: #7685bb;
      border: 2px solid #7685bb;
      /*background: #290037;
      border: 2px solid #290037;*/
      min-height: 40px; 
      margin-bottom: 0px;
      padding-bottom: 20px;
  }
  
  
  .navbar-inverse .navbar-nav > li > a{
      color:  #f6dcff;
      font-size: 23px;
      transition: font-size 0.5s ease;
  }
  .navbar-inverse .navbar-nav > li > a:hover,
  .navbar-inverse .navbar-nav > li > a:focus {
    color: white;
    font-size: 25px;
  }
  /* start nav */
  /*.navbar {
    background: #555;
    height: 55px;
    border: 2px solid #555;
    box-shadow: 4px 4px 9px;
    color: white;
    font-size: 25px;
    font-weight: 600px;
  }
  .navbar-inverse .navbar-nav > li > a {
    color: white;
    font-size: 20px;
    font-weight: 600px;
    text-shadow: 2px 2px 9px white;
    transition: font-size 0.5s ease;
  }
  .navbar-inverse .navbar-nav > li > a:hover,
  .navbar-inverse .navbar-nav > li > a:focus {
    color: white;
    font-size: 27px;
  
   /* text-shadow: 2px 2px 9px #222;
   /*box-shadow: 4px 4px 9px;
  }*/
  .dropdown-menu {
    background: #555;
    min-width: 138px;
  }
  .dropdown-menu > li > a {
    color: white;
    padding: 7px;
    ~webkit-transition: padding 0.5s ease;
    ~moz-transition: padding 0.5s ease;
    ~o-transition: padding 0.5s ease;
    transition: padding 0.5s ease;
  }
  .dropdown-menu > li > a:hover,
  .dropdown-menu > li > a:focus {
    background: #555;
    padding: 9px;
    color: black;
  }
  
  /*.navbar-inverse .navbar-nav > li > a:focus{
    color:#321fdb;
    background:white;
     font-size: 23px;
    font-weight: 600px;
    text-shadow: 2px 2px 9px #321fdb;
      box-shadow: 4px 4px 9px;
  
  }  */
  
  /* start nav */
  
  
  
  .sidebar {
    height: 100%;
    width: 0;
  position: fixed;
    z-index: 1;
    top:3px;
    left: 0;
    background-color:#7685bb;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
    
  }
  
  .sidebar a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color:  #ffffff;
    display: block;
    transition: 0.3s;
    
  }
  
  .sidebar a:hover {
    color: #61507a;
  }
  
  .sidebar .closebtn {
    /*position: absolute;*/
    top: 10;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
  }
  
  .openbtn {
    font-size: 20px;
    cursor: pointer;
    background-color: #7685bb;
    color: white;
    padding: 20px 25px 17px 25px;
    margin-left: 5%;
    border: 1px solid #7685bb;
  
  
  }
  
  .openbtn:hover {
    background-color:#b3b5b9;
  }
  
  #main {
    transition: margin-left .5s;
    padding: 16px;
  }
  
  /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
  @media screen and (max-height: 450px) {
    .sidebar {padding-top: 15px;}
    .sidebar a {font-size: 18px;}
  }
  .alert {
  font-size: 21px;
  font-weight: 600;
  }
  .alert ul {
    list-style-type: none;
  }
  </style>
  <body>
  
      <div class="wrapper">
  
          <!-- start navbar -->
      
          <nav class="navbar navbar-default navbar-inverse navbar-fixed-top " role="navigation">
            <div class="container">
              <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"></a>
            </div>
          
              <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                  
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name }}<span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                      
                      <li><a href="#">الملف الشخصي</a></li>
                      <li class="divider"></li>
                      <li><a class="dropdown-item"  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a><form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                     @csrf
                 </form> </li>
                      
                  </ul>
                </li>
                <li class="act"><a href="{{route('dashboard.main')}}">لوحة التحكم</a></li>
                
              </ul> 
                
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        
    
          
      
          <!-- end navbar -->
          <div id="mySidebar" class="sidebar">
      
            <a href="{{route('dashboard.main')}}"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
            
            <a href="{{route('student.show',['cat'=>'computer','year'=> 1])}}"><i class="fa fa-users"></i> الطلاب </a>
        
            <a href="{{route('teacher.index')}}"><i class="fa fa-briefcase"></i> الأساتذة </a>
        
            <a href="{{route('category.index')}}"><i class="fa fa-university"></i> الأقسام </a>
        
            <a href="{{route('room.index')}}"><i class="fa fa-th-list"></i> القاعات </a>
        
            <a href="{{route('booking.index')}}"><i class="fa fa-lock"></i> الحجوزات </a>
        
            <a href="{{route('adver.index')}}"><i class="fa fa-bullhorn"></i> الإعلانات </a>
                </div>
               
                 
          
        <!-- end sidebar -->
        <div id="main">
      
          <button class="openbtn navbar-fixed-top" onclick="openNav()">☰ </button>  
      <!-- start form-->
  
      <div class="add">
          <div class="container text-right style-container"  >
              <div class="tan" >

                @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        </div>
                 @endif

                  <h1> إضافة بيانات طالب </h1>
                  <form action="{{route('student.add')}}" method="POST">
                    @csrf
                  <div class="row">
                      <div class="col-md-6 col-md-offset-2" >
                          <input type="text" id="name" name="name" placeholder="name..">
                      </div>
                      <div class="col-md-3"  >
                          <label for="name"> اسم الطالب </label>
                      </div>
                      <div class="col-md-1"></div>
                  </div>
                  <div class="row">
                      <div class="col-md-6 col-md-offset-2" >
                          <input type="email" id="email" name="email" placeholder="email..">
                      </div>
                      <div class="col-md-3"  >
                          <label for="email"> البريد الإلكتروني </label>
                      </div>
                      <div class="col-md-1"></div>
                  </div>
                  <div class="row">
                      <div class="col-md-6 col-md-offset-2" >
                          <input type="password" id="password" name="password" placeholder="password.">
                      </div>
                      <div class="col-md-3"  >
                          <label for="password"> كلمة السر </label>
                      </div>
                      <div class="col-md-1"></div>
                  </div>
                  <div class="row">
                      <div class="col-md-6 col-md-offset-2" >
                        <select name="category">
                          {{-- {{$student->category->name}} --}}
                          @foreach ($categories as $cat)
                              <option value="{{ $cat->name }}"
                              @if ($category == $cat->name))
                                  selected="selected"
                              @endif
                              >{{ $cat->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3"  >
                          <label for="ka"> القسم </label>
                      </div>
                      <div class="col-md-1"></div>
                  </div>
                  <div class="row">
                      <div class="col-md-6 col-md-offset-2" >
                        <select name="year">
                   
                          @for ($i = 1; $i < 6; $i++)
                          <option value="{{$i}}"
                          @if ($year == $i)
                          selected="selected"
                          @endif
                          > {{$i}}</option> 
                          @endfor
                         </select>
                      </div>
                      <div class="col-md-3"  >
                          <label  style="margin:auto 10px;" for="year"> السنة </label>
                      </div>
                      <div class="col-md-1"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 col-md-offset-2" >
                      <select name="section">
                 
                        @for ($i = 1; $i < 4; $i++)
                        <option value="{{$i}}"
                        
                        > {{$i}}</option> 
                        @endfor
                       </select>
                    </div>
                    <div class="col-md-3"  >
                        <label  style="margin:auto 10px;" for="section"> الشعبة </label>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                  <div class="row">
                    <div class="col-md-6 col-md-offset-2" >
                        <input type="text" id="number" name="id_student" placeholder="number..">
                    </div>
                    <div class="col-md-3"  >
                        <label for="number"> رقم الطالب </label>
                    </div>
                    <div class="col-md-1"></div>
                  </div>
                  <div class="row">
                      <div class="col-md-6 col-md-offset-2" >
                        <select name="role_id">
                    
                          @foreach ($roles as $role)
                              <option value="{{ $role->name }}"
                              
                              >{{ $role->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3"  >
                          <label style="margin:auto 10px;" for="s"> الصلاحيات </label>
                      </div>
                      <div class="col-md-1"></div>
                  </div>
                  <div class="row">
                      <input class="btn btn-primary" type="submit"  value="إضافة">
                  </div>
                 </form>
              </div>    
          </div>
      </div>
  
       <!-- end form-->
  
      </div>
      <script>
        function openNav() {
          document.getElementById("mySidebar").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidebar").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
        }
        </script>
  </body>
</html>
