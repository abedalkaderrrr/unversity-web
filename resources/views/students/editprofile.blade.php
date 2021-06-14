@extends('layouts.app')

@section('content')
<div class="body-login">
    <form action="{{route('edit.profile')}}" method="POST" enctype="multipart/form-data">@csrf
<div class="container login text-center">
    <!--<div class="row login text-center">-->
        <!--<h1 > تسجيل الدخول </h1>
        <p class="lead"> تسجيل الدخول إلى حسابك </p>-->
        <div class="form-group">
            <p> 
             
              <input type="file"  accept="image/*" name="image" id="file"  onchange="loadFile(event)" style="display: none;"></p>
            <p><label for="file" style="cursor: pointer;" class="col-form-label "> الصورة الشخصية </label></p>
            <p>
                <img id="output" width="200" src="{{(Auth::user()->photo == null) ? url('/photos/ignore.jpg') : asset('storage/photos/'.Auth::user()->photo)}}" style="        height: 250px;
                border-radius: 50%;
                box-shadow: 2px 2px 5px;
            "/>
            </p>
            
            <script>
            var loadFile = function(event) {
              var image = document.getElementById('output');
              image.src = URL.createObjectURL(event.target.files[0]);
            };
            </script>
          </div>
        <div class="form-group">
            <!--<i class="fa fa-car"></i>-->
            <p><label for="" style="cursor: pointer;" class="col-form-label "> ايميل المستخدم </label></p>
            <input type="email" class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="اسم المستخدم" style="text-align: right;">

        </div>
        <div class="form-group">
            <p><label for="" style="cursor: pointer;" class="col-form-label ">  كلمة المرور القديمة</label></p>
            <input type="password" name="oldpassword" placeholder="كلمة المرور" class="form-control" style="text-align: right;">
        </div>
        <div class="form-group">
            <p><label for="" style="cursor: pointer;" class="col-form-label ">  كلمة المرور الجديده</label></p>
            <input type="password" name="newpassword" placeholder="كلمة المرور" class="form-control" style="text-align: right;">
        </div>
        <!--<p><label for="file" style="cursor: pointer;" class="col-form-label l-model"> </label></p>-->
        <div class="">
            <button  type="submit" class="btn btn-primary" > <i class="bi bi-person"></i> تعديل </button>
        </div>
        
    <!--</div>-->
</div>
</form>
</div>


@endsection