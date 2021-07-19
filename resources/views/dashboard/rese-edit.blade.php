<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>booking-edit</title>
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
       /* background: #290037;
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
                    
                  <li><a href="{{route('dashboard.profile',['id'=>Auth::user()->id])}}">الملف الشخصي</a></li>
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
    
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        
            <a href="{{route('dashboard.main')}}"><i class="fa fa-home"></i> الصفحة الرئيسية</a>
            
            <a href="{{route('student.show',['cat'=>'computer','year'=> 1])}}"><i class="fa fa-users"></i> الطلاب </a>
        
            <a href="{{route('teacher.index')}}"><i class="fa fa-briefcase"></i> الأساتذة </a>
        
            <a href="{{route('category.index')}}"><i class="fa fa-university"></i> الأقسام </a>
        
            <a href="{{route('room.index')}}"><i class="fa fa-th-list"></i> القاعات </a>
        
            <a href="{{route('booking.index')}}"><i class="fa fa-lock"></i> الحجوزات </a>
        
            <a href="{{route('adver.index')}}"><i class="fa fa-bullhorn"></i> الإعلانات </a>
            <a href="{{route('matrial.index')}}"><i class="fa fa-th-list"></i> المواد </a>
          </div>
               
                 
          
        <!-- end sidebar -->
        <div id="main">
      
          <button class="openbtn navbar-fixed-top" onclick="openNav()">☰ </button>  
    
        <!-- start form-->
    
        <div class="add">
            <div class="container text-right style-container"  >
                <div class="tan" >
                    <h1> تعديل الحجز </h1>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2" >
                            <input type="text" id="fname" name="firstname" placeholder="Your name..">
                        </div>
                        <div class="col-md-3"  >
                            <label for="fname"> صاحب الحجز </label>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2" >
                            <select id="department" name="department">
                                <option value="">غزل</option>
                                <option value="">تحكم</option>
                                <option value=""> حواسيب</option>
                            </select>
                        </div>
                        <div class="col-md-3"  >
                            <label for="department"> القسم </label>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2" >
                            <select id="k" name="k">
                                <option value="">إولى جديد</option>
                                <option value=""> ثانية جديد</option>
                                <option value=""> ثالثة جديد</option>
                            </select>
                        </div>
                        <div class="col-md-3"  >
                            <label for="k"> اسم القاعة </label>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2" >
                            <select id="m" name="m">
                                <option value=""> جودة</option>
                                <option value=""> نظم اتصالات حديثة</option>
                                <option value=""> برمجة شبكات</option>
                            </select>
                        </div>
                        <div class="col-md-3"  >
                            <label for="m"> اسم المادة </label>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2" >
                            <select id="mo" name="mo">
                                <option value="">الإولى</option>
                                <option value=""> الثانية</option>
                                <option value="">الثالثة</option>
                              </select>
                        </div>
                        <div class="col-md-3"  >
                            <label for="mo"> المحاضرة </label>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2" >
                            <input type="date" class="today">
                        </div>
                        <div class="col-md-3"  >
                            <label for="country"> اليوم </label>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row">
                        <input type="submit" value="تعديل">
                    </div>
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
        
        <!-- end sidebar -->
    
    </body>
</html>