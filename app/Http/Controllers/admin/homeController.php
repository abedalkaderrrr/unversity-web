<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User ;
use App\Models\Category ;
use App\Models\Advertisment ;
use App\Models\Booking;
use App\Models\Room ;

class homeController extends Controller
{
    public function index(){
        $users = User::where('role_id','student')->get()->count() ;
        $rooms = Room::all()->count();
        $teachers =  User::where('role_id','doctor')->get()->count() ;
        $bookings = Booking::all()->count();
        $advertisments = Advertisment::orderBy('id','desc')->get()->take('5');
       // dd($advertisments);
        

       return view('dashboard.main-page',['users'=>$users,'rooms'=>$rooms,'teachers'=>$teachers,'bookings'=>$bookings,'advertisments'=>$advertisments]);
    }
}
