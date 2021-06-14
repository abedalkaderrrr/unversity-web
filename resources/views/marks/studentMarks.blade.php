@extends('layouts.app')

@section('content')



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


<div class="container text-center page-mark">
    <!-- بداية الترويسة -->
    <div class="row">
        <div class="col ta">
            <br>
            <h4>{{Auth::user()->category->name}}</h4>
        </div>
        <div class="col ta">
            <h4>السنة الدراسية</h4>
            <h4> {{Auth::user()->category->year}} </h4>
        </div>
        <div class="col ta">
            <h4>
                الرقم الامتحاني<br>
                 {{Auth::user()->id_student}}<br>
                
            </h4>
        </div>

    </div>
    <!-- نهاية الترويسة -->
    <!-- بداية جدول العلامات -->
    <div class="container-table">
        <table class="table text-center table-mark" >
            <thead>
                <tr>
                    <td> النتيجة  </td>
                    <td> العلامة  </td>
                    <td> المادة </td>
                 
                                   
                </tr>               
            </thead>
            <tbody>
                @foreach ($marks as $mark)
                <tr>
                    <td> {{($mark->mark >= 60) ? 'ناجح':  'راسب'}} </td>
                    <td> {{$mark->mark}} </td>
                    <td> {{$mark->matrial->name}} </td>
                   
                  
                </tr>
                @endforeach
               
               
            </tbody>
        </table>

    </div> 
    <!-- نهاية جدول العلاملات -->
</div>



@endsection
