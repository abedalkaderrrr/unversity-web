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
          <li class="nav-item active">
            <a class="nav-link" href="advertising.html"> الإعلانات </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              المواد
            </a>
            <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#"> حقول </a>
              <a class="dropdown-item" href="#"> قواعد </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">برمجة</a>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="main-page-teacher.html">الصفحة الرئيسية <span class="sr-only">(current)</span></a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="#"> الصفحة الرئيسية </a>
          </li>-->
        </ul>
       
      </div>
      </div>
    </nav>
 <!-- end nav-->
 <div class="container total-n text-center">
     <div class="advertisting " >
         <div class="tital text-center">
            <h1 class="main-header"> الإعلانات </h1>

         </div>
        
        @foreach ($advertisments as $item)
        <div class="adver">
            
            <h2 class="secandry-header"> {{$item->title}} </h2>
            <h5 class="secandry-tital">{{$item->updated_at->diffForHumans()}}</h5>
            <p class="adver-p">{{$item->content}}</p>
 
         </div>
        @endforeach
        

     </div>

 </div>


@endsection