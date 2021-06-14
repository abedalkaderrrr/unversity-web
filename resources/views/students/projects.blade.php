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


<div class=" container total" >
    <!-- start program-->
    <div class=" container project-main">
        <div class="project part tan-tabel">
            <h1 class="main-header text-right"> المشاريع </h1>         
            <table class="table text-center ">
                <thead>
                    <tr>
                        <td style="width: 55%;margin-left: -20px;" class="file"> رفع المشروع </td>
                        <td > الحالة </td>
                        <td  class=""> عنوان المشروع </td>                   
                    </tr>               
                </thead>
                <tbody class="project">
                    
                    @foreach ($projects as $item)
                    <tr>
                        <form action="{{route('upload.project')}}" method="POST" enctype="multipart/form-data"> 
                            @csrf
                        <td > <button class="pres"> تقديم </button> 
                            <input type="text" name="id" hidden value="{{$item->id}}">
                        <input type="file" required name="project" style="width: 50%;" class="un"> 
                        </td>
                    </form>
                        <td >@foreach ($item->users as $user)
                            @if ($user->pivot->user_id == Auth::id())
                                تم التقديم
                            @endif
                        @endforeach</td>
                        <td class="">{{$item->title}}</td>                   
                    </tr> 
                    @endforeach
                    
               
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- end program-->
</div>


@endsection
