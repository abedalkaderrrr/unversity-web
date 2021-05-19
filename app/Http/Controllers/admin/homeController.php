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
    public function edit($id,Request $request) {
        $user = User::where('id',$id)->first();
     
   
     
     $request = $this->vailateeditStudent($request);
     $parameters = $request ;
    
     // dd($parameters );
     $user->update($parameters);
     return redirect()->back()->with(['status' =>'تم تحديث البيانات']);
     
    }
    protected function vailateeditStudent($request){
        //  dd($request); 
          return  $request->validate(
              [
                  
                  'name'=> 'required',
                  'email'=> 'required|email',
                //  'password'=> 'required|min:6',
                 
                //  'category_id'=> 'required|integer',
              ]
          );
      }
}
