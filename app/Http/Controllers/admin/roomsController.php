<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Room ;

class roomsController extends Controller
{
    public function index(){
        $rooms = Room::all(['id','name','capacity']);
       // dd($rooms);
        return view('dashboard.class-tabel',['rooms'=>$rooms]);
        // return  $this->success($rooms,'rooms',200);
    }
    public function addRooms(Request $request){
        $request->validate(
            ['capacity'=>'integer|required',
             
             'name'=>'string|required|unique:rooms',
             
  
           ]
       );
     $room= Room::create([
        'name'=>$request['name'] ,
        'capacity'=>$request['capacity'] ,
        'category_id'=>null ,
        
     ]);
     return redirect()->back()->with(['status'=>'تم الاضافة']);
    }

    public function deleteRooms($id){
       $booking = Booking::where('room_id',$id)->get();
       
        if($booking->isNotEmpty()){
        
            return redirect()->back()->with(['status'=>'هذه القاعة تحتوي على حجوزات']);
        }
        
        Room::find($id)->delete();
        return  redirect()->back();
    }
    public function  editRooms($id,Request $request){
     $room = Room::where('id',$id)->first();
     $room->update($request->all());
     return  $this->success([],'edit success',200);

    }
    
}
