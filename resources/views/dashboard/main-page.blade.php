<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>main-dashboard</title>
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
         padding-bottom: 70px;
         padding-top: 100px;
        /* background-image:linear-gradient(#ddd 50%,#f5f5f5 50%);*/
        background-color:#f5f5f5 ;
         font-family:'Tajawal', sans-serif;
 
     }
     
 .navbar {
     background: #969595;
     border: 2px solid #969595;
     padding-bottom: 10px;
 }
 .navbar-inverse .navbar-nav > li > a {
     color: white;
     font-size: 25px;
     padding-top: 25px;
     transition: font-size 0.5s ease;
 }
 
 .navbar-inverse .navbar-nav > li > a:hover,
 .navbar-inverse .navbar-nav > li > a:focus {
 font-size:27px ;
 color: white;
 }
 
 /*.dropdown-menu {
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
 
 .navbar-inverse .navbar-nav > li > a:focus{
   color:#321fdb;
   background:white;
    font-size: 23px;
   font-weight: 600px;
   text-shadow: 2px 2px 9px #321fdb;
     box-shadow: 4px 4px 9px;
 
 }  */
 
 /* start nav */
 
 
 body {
   /*font-family: "Lato", sans-serif;*/
 }
 
 .sidebar {
   height: 100%;
   width: 0;
 position: fixed;
   z-index: 1;
   top: 0;
   left: 0;
   background-color:#969595;
   overflow-x: hidden;
   transition: 0.5s;
   padding-top: 60px;
   
 }
 
 .sidebar a {
   padding: 8px 8px 8px 32px;
   text-decoration: none;
   font-size: 25px;
   color: #fff;
   display: block;
   transition: 0.3s;
   
 }
 
 .sidebar a:hover {
   color: #4d4747;
 }
 
 /*.sidebar .closebtn {
   position: absolute;
   top: 10;
   right: 25px;
   font-size: 36px;
   margin-left: 50px;
 }*/
 
 .openbtn {
   font-size: 25px;
     cursor: pointer;
     background-color: #969595;
     color: white;
     padding: 20px 25px 17px 25px;
     margin-left: 5%;
     border: 1px solid #969595;
 
 
 }
 @media (min-width: 0px) and (max-width: 770px) {
   .openbtn {
     font-size: 25px;
     cursor: pointer;
     background-color: #969595;
     color: white;
     padding: 10px 25px 17px 25px;
     margin-left: 5%;
     border: 1px solid #969595;
   }
 }
 
 .openbtn:hover {
   background-color: #444;
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
 
 
 <!-- start sidebar -->
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
   
     <!-- start statistics-->
 
     <div class="number text-center">
         <div class="container">
             <div class="row">
                 <div class="col-md-3 col-xs-6" >
                     <div class="num" style="background-color: #e55353;">
                         <p>{{$bookings}}</p>
                         <span> عدد الحجوزات </span>
                     </div>
                 </div>
                 <div class="col-md-3 col-xs-6" >
                     <div class="num" style="background-color: #f9b115;">
                         <p>{{$rooms}}</p>
                         <span>عدد الصفوف </span>
                     </div>
                 </div>
                 <div class="col-md-3 col-xs-6" >
                     <div class="num" style=" background-color: #39f;">
                         <p>{{$teachers}}</p>
                         <span>عدد الاساتذة</span>
                     </div>
                 </div>
                 <div class="col-md-3 col-xs-6" >
                     <div class="num" style="background-color: #321fdb;">
                         <p>{{$users}}</p>
                         <span>عدد الطلاب</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     
     <!-- end  statistics-->
 
 
     <!-- start advertisement -->
     <div class="adver-main text-right" >
         <div class="container  " >
             <div class="adver">
                 <h1> أخرالإعلانات</h1>
                 <div class="row">
                   @foreach ($advertisments as $adver)
                   <div class="col-xs-12">
                    <div class="adver1">
                        <h3>{{$adver->title}}</h3>
                        <a href="{{route('editPageAdver',['id'=>$adver->id])}}"><span class="glyphicon glyphicon-pencil"></span></a>
                    </div>
                  </div>
                   @endforeach
                     
                    
                 </div>
             </div>    
 
         </div>
     </div>
 
     <!-- end advertisement -->
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
