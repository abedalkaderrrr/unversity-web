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
          <a class="nav-link" href="{{route('teach.main')}}">الصفحة الرئيسية <span class="sr-only">(current)</span></a>
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
<div class="container subject-main">
  <div class="project text-center">
    <div class="row">
      <div class="col-6">
        <a href="{{route('teach.student.get',['category'=>$category])}}" class="led"> الطلاب </a>
      </div>
      <div class="col-6">
        <a href="{{route('posts.index',['id'=>$matrial])}}" class="led"> المنتدى </a>
      </div>
    </div>
  </div>
</div>
<div class=" container program-main">
  <div class="project2 part tan-tabel">
    <h4 class="main-header2 text-right">  المشاريع والوظائف</h4> 

  </div>

</div>
<div class="container mt-3">
  <ul class="list-group">
    
    @foreach ($projects as $item)
    <li class="list-group-item d-flex justify-content-between align-items-center">
      
     
      <div class="btn-group" role="group" aria-label="Basic example">
        <form action="{{route('teach.project.delete',['id'=>$item->id])}}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger btn-proj-adver" style=" border-radius: 4px;"> حذف </button>
      </form>
        <a type="button" class="btn btn-success btn-proj-adver" data-toggle="modal" data-target="#exampleModal4" data-whatever="{{$item->content}}" data-title="{{$item->title}}" data-id="{{$item->id}}" data-date="{{$item->date}}" style=" border-radius: 4px;">تعديل </a>
       <form action="{{route('download.projects',['id'=>$item->id])}}" method="GET">
        @csrf
        <button type="submit" class="btn btn-secondary btn-proj-adver" style="border-radius: 4px; background: #428bca; border  #428bca;"> تحميل </button>
      </form>
        
      </div>
      <span class=" projects ">{{$item->title}}</span>
      
      
      

    </li>   
    @endforeach

  </ul>
  <br>

  <a style=" background: #290037a8; border: #290037a8;  " type="button" class="btn btn-success btn-add btn-proj-adver" data-toggle="modal" data-target="#exampleModal" data-whatever="" > اضافة</a>

</div>



<div class=" container program-main">
  <div class="project2 part tan-tabel">
    <h4 class="main-header2 text-right"> الإعلانات </h4> 

  </div>

</div>
<div class="container mt-3">
  <ul class="list-group">
    
    @foreach ($advertisments as $item)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div class="btn-group" role="group" aria-label="Basic example">
            <form action="{{route('teach.adver.delete',['id'=>$item->id])}}" method="POST">
                @csrf
                @method("DELETE")
          <button type="submit" class="btn btn-danger btn-proj-adver" style=" border-radius: 4px;"> حذف </button>
            </form>

          <button type="button" class="btn btn-success btn-proj-adver" data-toggle="modal" data-target="#exampleModal3" data-id="{{$item->id}}" data-whatever="{{$item->content}}" data-title="{{$item->title}}" style="border-radius: 4px;" >  تعديل </button>
        </div>
        <span class=" projects">{{$item->title}}</span>
  
      </li>  
    @endforeach

  </ul>
  <br>

  <a style=" background: #290037a8; border: #290037a8;  " type="button" class="btn btn-success btn-add  btn-proj-adver" data-toggle="modal" data-target="#exampleModal2" data-whatever=""  > اضافة</a>

</div>
 
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <form class="form-add" action="{{route('teach.project.add')}}" method="POST">
      @csrf
    <div class="modal-body text-right">
      
        <div class="form-group">
          <label for="recipient-name" class="col-form-label l-model"> عنوان المشروع </label>
          <input type="text" id="tname" required name="title"  id="recipient-name" class=" form-control  s-model  text-right"  >
        </div>
        <div class="form-group">
          <label for="message-text " class="col-form-label l-model"> المطلوب </label>
          <input type="text" required name="content" id="tname"  id="recipient-name" class=" form-control  s-model text-right"  >
        </div>
        <div class="form-group">
          <label for="message-text" class="col-form-label l-model"> موعد التسليم </label>
          <input type="date" required id="tname" name="date"  id="recipient-name" class=" form-control  s-model"  >
          <input type="text" name="matrial_id" value="{{$matrial}}" hidden>
        </div>
        
      
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"> تطبيق </button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 28%;"> إلغاء </button>
    </div>
  </form>
  </div>
</div>
</div>

<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <form class="form-add" action="{{route('teach.advertisment.add',['category'=>$category,'matrial'=>$matrial])}}" method="POST">
        @csrf
    <div class="modal-body text-right">
      
        <div class="form-group">
          <label for="recipient-name" class="col-form-label l-model"> عنوان الإعلان </label>
          <input id="conten" name="title" required placeholder="conten.." class=" form-control  s-model">
          <label for="recipient-name" class="col-form-label l-model"> محتوى الإعلان </label>
          <textarea id="conten" required name="content" placeholder="conten.." class=" form-control  s-model "></textarea>
        </div>
        
      
    </div>
    <div class="modal-footer">
      <button type="submit" class="btn btn-primary"> تطبيق </button>
      <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 28%;"> إلغاء </button>
    </div>
    </form>
  </div>
</div>
</div>

<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="form-add" action="{{route('teach.advertisment.edit',['category'=>$category,'matrial'=>$matrial])}}" method="POST">
          @csrf
      <div class="modal-body text-right">
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label l-model"> عنوان الإعلان </label>
            <input id="conten" required name="title" placeholder="conten.." class=" form-control  s-model">
            <input type="text" name="id" hidden>
            <label for="recipient-name" class="col-form-label l-model"> محتوى الإعلان </label>
            <textarea required id="conten" name="content" placeholder="conten.." class=" form-control  s-model "></textarea>
          </div>
          
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary"> تطبيق </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 28%;"> إلغاء </button>
      </div>
      </form>
    </div>
  </div>
  </div>


  <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-add" action="{{route('teach.project.edit')}}" method="POST">
          @csrf
        <div class="modal-body text-right">
          
            <div class="form-group">
              <label for="recipient-name" class="col-form-label l-model"> عنوان المشروع </label>
              <input type="text" required id="tname" name="title"  id="recipient-name" class=" form-control  s-model  text-right"  >
            </div>
            <div class="form-group">
              <label for="message-text " class="col-form-label l-model"> المطلوب </label>
              <input type="text" required name="content" id="tname"  id="recipient-name" class=" form-control  s-model text-right"  >
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label l-model"> موعد التسليم </label>
              <input type="date" required id="tname" name="date"  id="recipient-name" class=" form-control  s-model"  >
              <input type="text" name="matrial_id" value="{{$matrial}}" hidden>
              <input type="text" name="id"  hidden>
            </div>
            
          
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary"> تطبيق </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 28%;"> إلغاء </button>
        </div>
        </form>

@endsection
