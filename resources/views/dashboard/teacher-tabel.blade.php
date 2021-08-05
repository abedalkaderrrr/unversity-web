<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>teacher-tabel</title>
    <!-- Scripts -->


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
       font-family: 'Tajawal', sans-serif;
       padding-bottom:40px ;
       background-image:linear-gradient( #e6e5f3 50% , #f5f5f5 50%);
       background-repeat: no-repeat;
       background-size: cover;
       box-sizing: border-box;
       /*padding-top: 30px;*/
       padding-top: 40px;
     }
       
   
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
     font-size: 25px;
   
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
     
    font-weight: bolder;
     color:  #488fcb;
     display: block;
     transition: 0.3s;
     
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
   .alert {
      text-align: right;
    font-size: 18px;
    font-weight: 600;
    position: absolute;
    margin: 59px 0;
    left: 50%;
    transform: translate(-50%, 0);
    width: 50%;
    }
   
   /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
   @media screen and (max-height: 450px) {
     .sidebar {padding-top: 15px;}
     .sidebar a {font-size: 18px;}
   }
     </style>
   <body>
    @if (session()->has('status'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{ session('status') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
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
           <h1 class="header-part"> الأساتذة </h1>
           <input class="text-right s-model search " id="myInput" type="text" placeholder="...بحث" >     

           <table class="table">
             <thead>
                 <tr>
                   <td></td>
                   <td> البريد الإلكتروني </td>
                   <td> اسم الإستاذ </td>
                   <td class="id"> رقم الإستاذ </td>
                 </tr>
             </thead>
             <tbody id="myTable">
                 
                 @foreach ($teachers as $teacher)
                 <tr>
                  <td>
                    <form style="display:inline" action="{{route('teacher.delete',['id' => $teacher->id])}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-danger " title="Delete">حذف</button>
                  </form>
                    <a href="{{route('teacher.pageEdit',['id'=>$teacher->id])}}" type="button" class="btn btn-success "> تعديل </a>
                    <a href="{{route('teacher.subject',['id'=>$teacher->id])}}" type="button" class="btn btn-info "> المواد </a>
                  </td>
                  <td> {{$teacher->email}}  </td>
                  <td class="name">{{$teacher->name}}</td>
                  <td class="id">{{$teacher->id}}</td> 
                 </tr>
                     
                 @endforeach
              </tbody>
              <tfoot >
                <tr>
                  <td>
                   <a href="{{route('teacher.add')}}" type="button" class="btn btn-primary foot"  style="margin-right :5px ;"> إضافة</a>
                  
   
                  </td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
   
              </tfoot>        
            </table>
           </div>
   
           <!-- end tabel-->
       </div> <!---->
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
       <script type="text/javascript">
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
