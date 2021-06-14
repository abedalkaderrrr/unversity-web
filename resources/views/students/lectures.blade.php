@extends('layouts.app')

@section('content')

<div class="lec" style="background:#e8a26608;">
    <!--start nav--> 
    <nav class="navbar navbar-expand-lg navbar-light main-page-teacher">
      <div class="container">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto ">
           
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Auth::user()->name}} 
              </a>
              <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('stud.profile')}}" >الملف الشخصي</a>
                  <a class="dropdown-item"  href="{{ route('logout') }}"  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">تسجيل الخروج</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf 
                  </form>
                  
                 
              </div>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="{{route('stud.index')}}">الصفحة الرئيسية <span class="sr-only">(current)</span></a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link" href="#"> الصفحة الرئيسية </a>
            </li>-->
          </ul>
         
        </div>
        </div>
      </nav>
    <!-- end nav-->

    <div class=" container total"  style="    border: 1px solid crimson;     box-shadow: 2px 2px 6px crimson;" >
     <!-- start program-->
     <div class=" container project-main " >
         <div class="project part tan-tabel">
           <h2 class="main-header-lecture text-right " style="color: crimson; text-shadow: 2px 2px 5px #e8a2666b;"> محاضرات مادة البرمجة </h2>         
           <table class="table text-center ">
             <thead style="    background: crimson;color: white;">
                 <tr>
                     <td style="width: 55%;margin-left: -20px; overflow: auto;" class="file">  الروابط الخاصة فيها </td>
                     <td > عنوان المحاضرة </td>
                                     
                 </tr>               
             </thead>
             <tbody class="project" style="background: #e8a2666b; background:#e8a26608; color: black;">
           
                @foreach ($lectures as $lecture)
                <tr>
                  <td > 
                    <div class="text-left" style=" overflow: auto;">
                    @foreach (explode(',',$lecture->links) as $item)
                    <p class="link">{{$item}}</p> 
                   
                    @endforeach
                  </div>
                            
                         
                     
                  </td>
                  <td >{{$lecture->title}} </td>
                               
              </tr>
                @endforeach
                 
         
                 
                 
             </tbody>
         </table>
         </div>
     </div>
     <!-- end program-->
 </div>
</div>
 


@endsection