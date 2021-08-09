@extends('layouts.app')

@section('content')

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


<div class="to">
 
  

    <!--<div class="container">-->
      <div class="tota">
        <!-- start-nav  -->
        <div class="row nav-m ">
          <div class="col-6">
            <div class="d-flex justify-content-start"> <a type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap" style="margin: 10px; border-radius: 4px;font-weight : bolder;" > نشر </a></div>


          </div>
          <div class="col-6">
            <div class="d-flex justify-content-start"> <h2  class="main-header">{{$matrial->name}}</h2></div>

          </div>
        </div>
        <!-- end-nav  -->
        <div class="row">

          <!--  start post -->

          <div class="col-lg-8 col-12 ">
            <div class="post" >
              <div class="row">
                <div class="col">
                  <!--<h1 class="main-header text-right group2"  >  <a href="mark.html"> منشوراتي </a> </h1>-->
                  <button class="btn btn-secondary">  <a href="{{route('stud.myposts')}}" style="color: white ;font-weight:bolder; text-decoration: none;"> منشوراتي </a>  </button>

                </div>
                <div class="col">
                  <h1 class="main-header text-right"> المنشورات </h1>

                </div>
                
              </div>
              
              
               <!-- post1 -->
               @foreach ($posts as $post)
                   
              
              <div class="post-contanier" >
                    <span class="username"><a href="#" data-abc="true">{{$post->user->name}}</a>  </span> 
                    <span class="description">{{$post->updated_at->diffForHumans()}}</span>
                    <p class="conten">{{$post->content}}</p>
                    <!--<img class="img-responsive pad" src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1557148425/woman-570883_1280.jpg" alt="Photo">-->
                    @if ($post->path)
                    <img class="img-responsive pad" src="{{asset('storage/photos/'.$post->path)}}" alt="Photo">
                    @endif
                   
                    
                    <div class="container row">
                          <!--<div class="col-6" style="">
                              <div class="d-flex justify-content-start">
                                <a type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap" style="margin: 10px; border-radius: 4px;" >  تعليقات </a>
                                <a type="button" class="btn btn-primary"  style="margin: 10px; border-radius: 4px;"> إعجاب </a>
                                
                              </div>

  
                          </div>
                          <div class="col-6" style="">
                              <div class="d-flex justify-content-end" style="padding: 10px;">
                                <span class="pull-right text-muted">  <i class="fa fa-thumbs-o-up"></i> 5    </span>
                              </div>
                          </div>-->
                          <a class="btn btn-secondary btn-post" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-commenting-o"></i> تعليقات
                         </a>
                         
                         <div class="collapse col-post" id="collapseExample">
                             <div class="card card-body" >
                               <!-- start add comment -->
                               <form action="{{route('posts.commit')}}" method="POST">
                                @csrf
                             
                               <div class="row form-group add-re">
                                <div class="col-2"> <input class=" btn-secondary" type="submit" value="تعليق" ></div>
                                <div class="col-10"><input  class="form-control input-add-comment text-right" name="content" type="text" placeholder="اكتب تعليق عام" ></div>
                                <input type="text" name="post_id" value="{{$post->id}}" hidden>
                               </div>
                              </form>
                              
                               {{-- hshshshshhsh --}}
                               @foreach ($post->comments as $comment)
                                   
                              
                               <!-- start  comment -->
                               <div class="">
                                <ul class="chat-list">
                                  
                                  <li class="out">
                                      <div class="chat-img">
                                          <img alt="Avtar" src="{{($comment->user->photo == null) ? url('/photos/ignore.jpg') : asset('storage/photos/'. $comment->user->photo)}}">
                                      </div>
                                      <div class="chat-body">
                                          <div class="chat-message">
                                            <span class="username-c"><a href="#" data-abc="true">{{$comment->user->name}}</a></span>
                                            <span class="description-c">{{$comment->updated_at->diffForHumans()}}</span>
        
                                           
                      
                                            
                                            <p class="conten-c">{{$comment->content}}</p>
                                          <br>
                                       
          
                                            <a class="btn btn-secondary btn-post" data-toggle="collapse" href="#replay1" role="button" aria-expanded="false" aria-controls="collapseExample">
                                              <i class="fa fa-reply-all" ></i>الردود
                                             </a>
                                           
                                          </div>
                                      </div>
                                  </li>
                                  
      
                              </ul>
                        
                             

                          
                                 <div class="collapse" id="replay1">
                              
                                     <div class="card card-body"    >
                                  
                                    <!--</br>-->
                                       <!-- start  replay2 -->
                                       @foreach ($comment->replies as $reply)
                                           
                                       
                                       <div class="re2">
                                        <ul class="chat-list">
                                  
                                          <li class="out">
                                              <div class="chat-img">
                                                  <img alt="Avtar" src="{{($reply->user->photo == null) ? url('/photos/ignore.jpg') : asset('storage/photos/'.$reply->user->photo)}}">
                                              </div>
                                              <div class="t chat-body ">
                                                  <div class="chat-message2">
                                                    <span class="username-c"><a href="#" data-abc="true">{{$reply->user->name}}</a></span>
                                                    <span class="description-c">{{$reply->updated_at->diffForHumans()}}</span>
                
                                                   
                              
                                                    <p class="conten-c">{{$reply->content}}</p>
            
                                                  </div>
                                              </div>
                                          </li>
                                          
              
                                      </ul>
                                       </div>
                                       @endforeach
                                       <!-- end  replay2 -->
                                       <!-- start add replay -->
                                       <form action="{{route('posts.reply')}}" method="POST">
                                        @csrf
                                      
                                       <div class="row form-group add-re">
                                           <div class="col-2"> <input class=" btn-secondary" type="submit" value="رد" ></div>
                                           <div class="col-10"><input  class="form-control input-add-comment text-right" name="content" type="text" placeholder="اكتب رد عام"></div>
                                       </div>
                                       <input type="text" name="comment_id" value="{{$comment->id}} " hidden>
                                      </form>
                                       <!-- end add replay -->
                                 
                                      </div>
                                    </div>

                                </div>
                             
                              
                                   
                                      
                               <!-- end  comment1 -->
                              <br>
                              @endforeach
                              {{-- gadgagagafhafh --}}
                             </div>
                           </div>
                    </div>
              </div>
              <!--post1-->
              @endforeach
               


                

          </div>
          
            


              </div>
               
        

          <!--  end post --> 


          <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{route('posts.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body text-right">
                  
                    
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label l-model"> محتوى المنشور </label>
                      <textarea id="conten" name="content" placeholder="conten.." class=" form-control  s-model" style="width: 80%;margin: auto; "></textarea>
                    
                    </div>
                    <div class="form-group">
                      <p> 
                       <input type="text" name="matrial_id" value="{{$matrial->id}}" hidden>
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
                  <button type="submit" class="btn btn-primary"> نشر </button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 28%;"> إلغاء </button>
                </div>
               </form>
              </div>
            </div>
          </div>


          <!-- start project and advertisting  -->
          <div class="col-lg-4 col-12 proj-adver fixed">
              <div class="part2 text-right">
                <div class="project-m adver">
                  <h1 class="main-header"> <a href="{{(Auth::user()->role_id == 'student')?route('stud.lectures',['id'=>$matrial->id]):'#'}}" class="" >  المحاضرات </a> </h1>
                  
                </div>
                  
                <div class="project-m adver"> 
                  <h1 class="main-header"> <a href="{{(Auth::user()->role_id == 'student')?route('stud.projects',['cat'=>$matrial->cat_name]):'#'}}" class="" > المشاريع </a> </h1>
                  <ul class="list-group text-right project-list" >
                    
                    @foreach ($projects as $project)
                    <li class="list-group-item "> <span>{{$project->title}}</span><div class="dropdown-divider"></div> </li>
                    @endforeach
                  </ul>
                </div>
                <div class="advertisement adver">
                  <h1 class="main-header"><a href="{{(Auth::user()->role_id == 'student')?route('stud.advertisments',['cat'=>$matrial->cat_name]):'#'}}" class="" > الإعلانات </a></h1>
                   
                    <ul class="list-group text-right advertisting-list" >
                      @foreach ($advertisments as $item)
                          
                     
                        <li class="list-group-item ">
                            <div class="adver-list">
            
                                <h2 class="secandry-header">{{$item->title}}</h2>
                                <h5>{{$item->updated_at->diffForHumans()}}</h5>
                                <p>{{$item->content}}</p>
                    
                             </div>
                             <!--<div class="dropdown-divider"></div>-->
                        </li>
                        @endforeach
                        
                      </ul>
                  </div>

                </div>
          </div> <!-- class="col-4 proj-adver"-->
            
          <!-- start project and advertisting  -->

        </div> <!-- class ="row"-->
      </div> <!--class="tota"-->
   <!-- </div>-->
</div><!-- div class="to" -->
<!--<div class="scroll-top" id="scroll-top">
  <i class="fa fa-chevron-up fa-2x"></i>
</div>
<script >
  var scrollButton=$("#scroll.top");

  $(window).scroll(function(){
      if ($(this).scrpllTop()>= 700)
      {
          scrollButton.show();
      }
      else{
          scrollButton.hide();
      }
  });
  scrollButton.click(function(){
      $("html,body").animate({scrolltop:0},600);
  });


 </script>-->



<script>
  // Reply box popup JS
  $(document).ready(function(){
    $(".reply-popup").click(function(){
      $(".reply-box").toggle();
    });
  });
  </script>



@endsection