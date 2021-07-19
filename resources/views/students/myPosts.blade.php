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
          <a class="nav-link" href="{{(Auth::user()->role_id == 'student')?route('stud.index'):route('teach.main')}}">الصفحة الرئيسية <span class="sr-only">(current)</span></a>
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
        <div class="my-posts part tan-tabel">
            <h1 class="main-header text-right"> منشوراتي </h1>         
            <table class="table text-center ">
                <thead>
                    <tr>
                        <td >  </td>
                        <td  class=""> عنوان المنشور  </td>                   
                    </tr>               
                </thead>
                <tbody class="my-posts">
                    @foreach ($posts as $post)
                        
                   
                    <tr>
                        <td>
                            <form action="{{route('post.delete')}}" style="display: inline-block" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="text" name="id" value="{{$post->id}}" hidden>
                          <button type="submit" class="btn btn-danger btn-proj-adver" style=" border-radius: 4px;"> حذف </button>
                          </form>
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal9" data-whatever="{{$post->content}}" data-id="{{$post->id}}"  style="margin: 10px; border-radius: 4px;" > تعديل </button>
                        </td>

                        <td class="" 
                        style="max-width: 200px;text-overflow:ellipsis;white-space: nowrap;overflow:hidden
                        ">{{$post->content}}</td>                   
                    </tr>
                    @endforeach
                    
                    
               
                    
                    
                </tbody>
            </table>
        </div>
    </div>
    <!-- end program-->
    <div class="modal fade" id="exampleModal9" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{route('posts.edit')}}" method="POST" enctype="multipart/form-data">
              @csrf
            <div class="modal-body text-right">
             
                <div class="form-group">
                  <label for="recipient-name" class="col-form-label l-model"> مضمون المنشور </label>
                  <textarea id="conten" name="content" placeholder="conten.." class=" form-control  s-model" style="width: 80%;margin: auto; "></textarea>
                  <input type="text" name="id" value="" hidden>
                </div>
                <div class="form-group">
                  <p> 
                   
                    <input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
                  <p><label for="file" style="cursor: pointer;" class="col-form-label l-model">اختيار صورة</label></p>
                  <p><img id="output" width="200" style="    margin-right: 30%;"/></p>
                  
                  <script>
                  var loadFile = function(event) {
                    var image = document.getElementById('output');
                    image.src = URL.createObjectURL(event.target.files[0]);
                  };
                  </script>
                </div>
                
             
            </div>
            <div class="modal-footer">
              <button type="sumbit" class="btn btn-primary"> نشر </button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 28%;"> إلغاء </button>
            </div>
          </form>
          </div>
        </div>
      </div>>
    
    
</div>
<div class="test"></div>


@endsection