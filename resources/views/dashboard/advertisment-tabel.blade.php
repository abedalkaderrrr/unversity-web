<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>advertisement-tabel</title>
    <!-- Scripts -->


    <!-- Fonts -->
    

    <!-- Styles -->
    

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200&display=swap" rel="stylesheet">  
    <link rel="stylesheet" href="{{ asset('css/dashboard/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/css/font-awesome.min.css') }}">

</head>
<style>

    body{
        font-family: 'Tajawal', sans-serif;
        padding-bottom:40px ;
        background-image:linear-gradient( #e6e5f3 50% , #f5f5f5 50%);
        background-repeat: no-repeat;
        background-size: cover;
        box-sizing: border-box;
        /*padding-top: 30px;*/
        padding-top: 40px;
      }
      /* إصلاح خاص بالجدول من أجل الحواف الدائرية بلأعلى */
      .tan-tabel {
        margin-top: 2%;
      }
      /* إصلاحات التنسيق للجدول الخاصة بالريسبونس - بداية*/
    /*@media (min-width: 0px) and (max-width: 535px) {
      .header-part {
       
        font-size: 25px;
        font-weight: bold;
      }
      tbody {
        font-size: 14px;
        font-weight: 180px;
      }
      thead {
        font-size: 15px;
        font-weight: 300px;
      }
      .foot {
        width: 45%;
      }
      .student-form label {
        font-size: 15px;
        font-weight: 300px;
        margin-right: 8px;
      }
      .btn{
        display: inline;
      }
    } 
    
        
      @media (min-width: 536px) and (max-width: 800px) {
      .header-part {
        font-size: 25px;
        font-weight: bold;
      }
      tbody {
        font-size: 14px;
        font-weight: 180px;
      }
      thead {
        font-size: 15px;
        font-weight: 300px;
      }
      .foot {
        width: 45%;
      }
      .student-form label {
        font-size: 15px;
        font-weight: 300px;
        margin-right: 8px;
      }
    }*/
    /* إصلاحات التنسيق للجدول الخاصة بالريسبونس - نهاية*/
      /* إصلاحات التنسيق للجدول الخاصة بالريسبونس - بداية*/
      @media (min-width: 0px) and (max-width: 630px) {
      .header-part {
        font-size: 25px;
        font-weight: bold;
      }
      tbody {
        font-size: 14px;
        font-weight: 180px;
      }
      thead {
        font-size: 15px;
        font-weight: 300px;
      }
      .foot {
        width: 45%;
      }
      .student-form label {
        font-size: 15px;
        font-weight: 300px;
        margin-right: 8px;
      }
      .btn{
        display: inline;
      }
    } 
     
      @media (min-width: 631px) and (max-width: 1000px) {
      .header-part {
        font-size: 25px;
        font-weight: bold;
      }
      tbody {
        font-size: 14px;
        font-weight: 180px;
      }
      thead {
        font-size: 15px;
        font-weight: 300px;
      }
      .foot {
        width: 45%;
      }
      .student-form label {
        font-size: 15px;
        font-weight: 300px;
        margin-right: 8px;
      }
    }
    /* إصلاحات التنسيق للجدول الخاصة بالريسبونس - نهاية*/
    
    
    .navbar {
       /* padding-top: 5px;*/
       background: #e6e5f3;
        border: 2px solid #e6e5f3;
        min-height: 40px; 
        margin-bottom: 0px;
        padding-top: 10px;
    }
    
    
    .navbar-inverse .navbar-nav > li > a{
      /*color: #4938df;*/
      color: #488fcb;
      
        font-size: 25px;
        font-weight: bolder;
        transition: font-size 0.5s ease;
    }
    .navbar-inverse .navbar-nav > li > a:hover,
    .navbar-inverse .navbar-nav > li > a:focus {
     /* color: #4938df;*/
      color: #488fcb;
      background : #e6e5f3;
      font-size: 25px;
    }
    .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus {
    color: #fff;
    background-color: #488fcb;
    background-color : #e6e5f3 ;
    
}
    
    
    
    .sidebar {
      height: 100%;
      width: 0;
    position: fixed;
      z-index: 1;
      top:3px;
      left: 0;
      background-color: #e6e5f3;
      overflow-x: hidden;
      transition: 0.5s;
      padding-top: 60px;
      
    }
    
    .sidebar a {
      padding: 8px 8px 8px 32px;
      text-decoration: none;
      font-size: 25px;
      font-weight : bolder ;
      color:  #488fcb;
      display: block;
      transition: 0.3s;
      font-weight: bolder;
      
      
    }
    
    .sidebar a:hover {
      color: #919396;
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
      background-color: #e6e5f3;
      color: #488fcb;
      padding: 20px 25px 17px 25px;
      margin-left: 5%;
      border: 1px solid #e6e5f3;
    
    
    
    }
    
    /*.openbtn:hover {
      background-color:#919396;
    }*/
    
    #main {
      transition: margin-left .5s;
      padding: 16px;
    }
    
    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
      .sidebar {padding-top: 15px;}
      .sidebar a {font-size: 18px;}
    }
    td {
      text-overflow: ellipsis;
      overflow: hidden; 
      white-space: nowrap;
      max-width: 70px
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
          <!-- start tabel-->
    
        
         <div class="container text-center part tan-tabel">
          <h1 class="header-part"> الإعلانات</h1>
          <input class="text-right s-model search " id="myInput" type="text" placeholder="...بحث" >       
             <table class="table">
                 <thead>
                     <tr>
                         <td></td>
                         <td> تاريخ الانتهاء </td>
                         <td>  الشريحة</td>
                         <td> المحتوى</td>
                         <td> العنوان</td>
                                           
                     </tr>               
                 </thead>
                 <tbody id="myTable">
                     @foreach ($advertisment as $adver)
                     <tr>
                      <td>
                        <form style="display:inline" action="{{route('advertisment.delete',['id' => $adver->id])}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger " title="Delete">حذف</button>
                      </form>
                        <a href="{{route('editPageAdver',['id'=>$adver->id])}}" type="button" class="btn btn-success "> تعديل </a></td>
                      <td>{{$adver->period}}</td>
                      <td>{{$adver->slice}}</td>
                      <td>{{$adver->content}}</td>
                      <td>{{$adver->title}}</td>
                                       
                     </tr>
                     @endforeach
                     


                 </tbody>
                 <tfoot >
                   <tr>
                     <td>
                      <a href="{{route('advertisment.add')}}" type="button" class="btn btn-primary foot"  style="margin-right :5px ;"> إضافة</a>
                     </td>
                     <td></td>
                     <td></td>
                     <td></td>
                     <td></td>
    
                   </tr>
    
                 </tfoot>
             </table>
        </div>
        <!-- end tabel-->
    
    
    </div>  <!---->
     
    </div>
    <script src="{{ asset('js/dashboard/jquery-1.11.1.min.js') }}" ></script>
    <script src="{{ asset('js/dashboard/bootstrap.js') }}" ></script>
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

<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>

     
    </body>
</html>
