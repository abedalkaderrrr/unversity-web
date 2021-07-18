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
     <form action="{{route('search.teacher')}}" method="POST">
        @csrf
    <div class="row">

        <div class="col">
           <button type="sumbit" class="btn btn-secondary" > تطبيق </button>

        </div>



         <div class="col">
            <select class="form-control s-model" name="id" id="recipient-name">

                @foreach ($teachers as $item)
                <option value="{{$item->id}}"
                    @if (isset($user))
                    @if ($user->id==$item->id)
                    {{'selected'}}
                    @endif
                    @endif
                    >
                    {{$item->name}}

                </option>
                @endforeach

            </select>

         </div>

     </div>
    </form>


<!-- start program-->
@if (isset($user))
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

                            <p>{{$bookings[$i][$j]->user->name}}</p>
                            <p>{{$bookings[$i][$j]->matrial->name}}</p>
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
@endif
<!-- end program-->



@endsection
