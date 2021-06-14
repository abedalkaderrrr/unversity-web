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
          <li class="nav-item">
            <a class="nav-link" href="../part2/advertising.html"> الإعلانات </a>
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
            <a class="nav-link" href="../part2/main-page-teacher.html">الصفحة الرئيسية <span class="sr-only">(current)</span></a>
          </li>
          <!--<li class="nav-item">
            <a class="nav-link" href="#"> الصفحة الرئيسية </a>
          </li>-->
        </ul>
       
      </div>
      </div>
    </nav>
 <!-- end nav-->  
   <div class="container contain">
       <form action="{{route('marks.select.matrial')}}" method="POST">@csrf
    <div class="row">
        
      <div class="col">
         <button type="sumbit" class="btn btn-secondary" > تطبيق </button>

      </div>

    

       <div class="col">
          <select class="form-control s-model" name="cat_name" id="recipient-name">
              
              @foreach ($category as $item)
              <option value="{{$item->catId}}">{{$item->catId}}</option>
              @endforeach
             
          </select>

       </div>
       
   </div>
</form>
   <div class="row">
      
      <div class="col search d-flex justify-content-center ">
        <input class="text-right s-model " id="myInput" type="text" placeholder="بحث" > <i class="fas fa-pen"></i>
         <label class="private"> المواد </label>

      </div>
      
      
   </div>
   @if (isset($matrials))
       
 
   <div class="">
      <table class="table text-center table-mark">
          <thead>
              <tr>
                  <td style="width: 55%;margin-left: -20px;" class="file">  </td>
                  <td > اسم المادة  </td>                   
              </tr>               
          </thead>
          <tbody class="project" id="myTable">
              
              @foreach ($matrials as $matrial)
              <tr>
                <td >
                    <form action="{{route('upload.matrial')}}" method="POST" enctype="multipart/form-data">@csrf
                     <button class="sumbit"> تقديم </button> 
                     <input type="file" name="marks" required style="width: 50%;" class="un">
                     <input type="text" name="matrial_id" value="{{$matrial->id}}" hidden>
                    
                    </form>
                </td>
                <td >{{$matrial->name}}</td>                   
            </tr>
              @endforeach
              
         
              
              
          </tbody>
      </table>
   </div>
   @endif




   </div>
    
    
     
    
    <script>
      
    </script>










@endsection