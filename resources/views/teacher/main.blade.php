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
 <div class=" container total">
    <!--start subject-->
        <div class="container subject-main">
            <div class="subject text-right">
                <h1 class="main-header">  المواد الدراسية </h1>
                <div class="row">
                    
                   @foreach ($matrials as $item)
                   <div class="col-md-3 col-sm-4 col-4">
                    <a href="{{route('teach.project',['category'=>$item->cat_name,'matrial'=>$item->id])}}"  class="led open-test"> {{$item->name}} </a>
                </div>
                   @endforeach
                </div>
            </div>
        </div>
    <!--end subject-->
         <!--start subject-->
 <div class="container subject-main">
    <div class="subject text-right">
        <h1 class="main-header">  المحاضرات </h1>
        <div>
            
           
              
              <div class="accordion" id="accordionExample">
                <div class="card">
                  <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                      <button class="btn btn-link " type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        رفع المحاضرات
                      </button>
                    </h2>
                  </div>
              
                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="container-leacture card-body ">
                        <form action="{{route('teach.lecture')}}" method="POST">
                          @csrf
                          <div class="form-lracture">
                              <div class="row point">
                                  <div class="col-9">
                                    <input type="text" id="conten" name="title" placeholder="conten.." class=" form-control  ss-model" style="">

                                  </div>
                                  <div class="col-3">
                                    <label for="recipient-name" class="col-form-label ll-model text-right"> العنوان </label>

                                  </div>
                              </div>
                              <div class="row point">
                                <div class="col-9">
                                  <input type="text" id="conten" name="links" placeholder="conten.." class=" form-control  ss-model" style="">

                                </div>
                                <div class="col-3 ">
                                    <label for="message-text " class="col-form-label ll-model text-right"> روابط المحاضرات </label>

                                </div>
                                
                            </div>
                            <div class="row point">
                              <div class="col-9">
                                <select type="text" id="conten" name="matrial" placeholder="conten.." class=" form-control  ss-model" style="">
                                  @foreach ($matrials as $matrial)
                                      <option value="{{$matrial->id}}">{{$matrial->name}}</option>
                                  @endforeach
                                </select>

                              </div>
                              <div class="col-3 ">
                                  <label for="message-text " class="col-form-label ll-model text-right">  المادة </label>

                              </div>
                              
                          </div>
                            <button type="submit" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 44%;"> رفع </button>

                          </div>
                        </form>
                      
                    </div>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header" id="headingTwo">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        المحاضرات التي تم رفعها
                      </button>
                    </h2>
                  </div>
                  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                    <div class="card-body program">

                        <div class=" table-responsive container-table-lracture  ">
                            <table class="table  text-center">
                                <thead>
                                    <tr>
                                        <td>  </td>
                                        <td class=""> العنوان </td> 
                                        <td class=""> المادة </td>                  
                                    </tr>               
                                </thead>
                                <tbody>
                                    
                                   
                                    @foreach ($lectures as $item)
                                    <tr>
                                      <td>
                                        <form action="{{route('teach.lecture.delete',['id'=>$item->id])}}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                        
                                         <button type="submit" class="btn btn-danger" data-dismiss="modal" style="margin-right: 44%;"> حذف </button> 
                                        </td>
                                      </form>
                                      <td>{{$item->title}}</td>
                                      <td class="">{{$item->matrial->name}}</td> 
                                                      
                                  </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
        
                        </div> 
                    </div>
                  </div>
                </div>
                
                </div>
              </div>
            
        </div>

    </div>

<!--end subject-->
<!-- start program-->
    <div class=" container program-main">
        <div class="program part tan-tabel">
            <h1 class="main-header text-right"> الجدول الدراسي </h1> 
            <div class=" table-responsive container-table ">
                <table class="table  text-center">
                    <thead>
                        <tr>
                            <td> المحاضرة الخامسة </td>
                            <td> المحاضرة الرابعة  </td>
                            <td> المحاضرة الثالثة  </td>
                            <td> المحاضرة الثانية  </td>
                            <td> المحاضرة الأولى </td>
                            <td class=""> </td>                   
                        </tr>               
                    </thead>
                    <tbody>

                        @for ($i =1; $i < 6 ; $i++)
                        <tr>

                        @for ($j = 5; $j > 0; $j--)
                        <td >
                           
                                @if ($bookings[$i][$j] != null)
                                <a type="button" data-toggle="modal" data-day="{{$i}}" data-lecture="{{$j}}" class="open-model" data-target="#exampleModal" data-whatever="@getbootstrap" href="#exampleModal">
                                <p>{{$bookings[$i][$j]->matrial->name}}</p>
                                <p>{{$bookings[$i][$j]->category->name}}</p>
                                <p>{{$bookings[$i][$j]->category->year}}</p>
                                <p>{{$bookings[$i][$j]->category->section}}</p>
                                <p>{{$bookings[$i][$j]->room->name}}</p> 
                                 </a>
                                
                                @else
                                <a type="button" data-toggle="modal" data-day="{{$i}}" data-lecture="{{$j}}" class="open-model" data-target="#exampleModal" data-whatever="@getbootstrap" href="#exampleModal">
                                    <p>  </p>
                                    <p>  </p>
                                    <p>غير محدد</p>
                                    <p></p>
                                    <p></p>
                                    </a>   
                                @endif
                                

                                
                               
                        </td> 
                        @endfor
                        <td class="today"> {{$days[$i]}}  </td>
                        </tr>   
                        @endfor
                        
                        {{-- <tr>
                            <td >
                                <a type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">
                                    
                                    <p> حقول </p>
                                    <p> حواسيب </p>
                                    <p> سنة إولى </p>
                                    <p> مدرج حديث </p>
                                    
                                </a>   
                            </td>
                                           
                        </tr> --}}
                    </tbody>
                </table>

            </div>        
            
        </div>
    </div>
<!-- end program-->


<!-- start model-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <!--<div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> الحصة الدرسية </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>-->
        <div class="modal-body text-right">
          <form  class="form-add" action="{{route('teach.store')}}" method="POST">
            @csrf
            <div class="form-group">
              <label for="recipient-name" class="col-form-label l-model"> المادة </label>
              <select required class="form-control s-model section" name="matrial" id="recipient-name" >
               
               @foreach ($matrials as $item)
               <option value="{{$item->id}}"> {{$item->name}} </option>
               @endforeach
            </select>
            </div>
            <div class="form-group">
              <label for="message-text " class="col-form-label l-model"> اليوم </label>
              <input type="text" name="day"   class="form-control s-model day-model day" readonly >
              <input type="text" name="url" hidden value="{{route('test.api')}}" class="url">
            </div>
            <div class="form-group">
              <label for="message-text " class="col-form-label l-model"> المحاضرة </label>
              <input type="text" name="lecture"  value="" class="form-control s-model lecture-model lecture" readonly >
            </div>
            
            <div class="form-group">
              <label for="message-text" class="col-form-label l-model "> الشعبة </label>
              <select required class="form-control s-model sectionSelected" name="category" id="recipient-name">
                <option value="">غير محدد</option>
                
            </select>
            </div>
            <div class="form-group">
              <label for="message-text" class="col-form-label l-model"> القاعة </label>
              <select required class="form-control s-model roomSelected" name="room" id="recipient-name">
                
            </select>
            </div>
         
        </div>
        <div class="modal-footer">
          <button type="submit" name="action" value="delete" class="btn btn-danger"> حذف </button>
          <button type="submit" name="action" value="create" class="btn btn-primary"> تطبيق </button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-right: 28%;"> إلغاء </button>
        </div>
      </form>
      </div>
    </div>
  </div>

  <script>
    console.log('sagasga');
    
    </script>    


 
  <!-- end model-->
@endsection
