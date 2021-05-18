<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\Category;
use App\Models\User;
use App\Models\Room;
use App\Models\Matrial;

class bookingController extends Controller
{
    public function index(){
        $bookings = DB::table('bookings')
        ->join('categories', 'categories.id', '=', 'bookings.category_id')
        ->join('users', 'users.id', '=', 'bookings.user_id')
        ->join('rooms', 'rooms.id', '=', 'bookings.room_id')
        ->join('matrials', 'matrials.id', '=', 'bookings.matrial_id')
        ->select( 'bookings.id','users.name as user','rooms.name as room',
        'categories.name as category','categories.year as year','categories.section as section','bookings.day','bookings.lecture',
        'matrials.name as matrial')
        ->get();
        return  view('dashboard.reserve-tabel',['bookings'=>$bookings]);
    }
    public function adddBooking(Request $request){
     $request = $this->addBookingValidate($request);

     $user = User::where('name',$request['name'])->first() ;
     $category = Category::where('name',$request['category'])->where('year',$request['year'])->where('section',$request['section'])->first();
     $room = Room::where('name',$request['room'])->first();
     $matrial = Matrial::where('name',$request['matrial'])->first();
     if($user == null) {
         
         return redirect()->back()->with(['warning'=>'اسم صاحب الحجز غير موجود']);
     }
     if($category == null) {
         return redirect()->back()->with(['warning'=>'القسم غير موجود']);
     }
     if($room == null) {
         return redirect()->back()->with(['warning'=>'الغرقة غير موجودة']);
     }
     if($matrial == null) {
         return redirect()->back()->with(['warning'=>'المادة غير موجود']);
     }
     $checkCate = Booking::where('day',$request['day'])
                    ->where('category_id',$category->id)->where('lecture',$request['lecture'])->first();
                    
    $checkUser = Booking::where('day',$request['day'])
                    ->where('user_id',$user->id)->where('lecture',$request['lecture'])->first();
    $checkRoom = Booking::where('day',$request['day'])
                    ->where('room_id',$room->id)->where('lecture',$request['lecture'])->first();                  
    if($checkCate != null){
         return redirect()->back()->with(['warning'=>' هذا القسم محجوز  بهذا  التوقيت ']);
    }
    if($checkUser != null){
        return redirect()->back()->with(['warning'=>' هذا المدرس محجوز  بهذا  التوقيت ']);
   }
   if($checkRoom != null){
    return redirect()->back()->with(['warning'=>' هذه القاعة محجوز  بهذا  التوقيت ']);
}
     $booking= Booking::create(
         ['user_id'=> $user->id,
         'room_id'=> $room->id,
         'matrial_id'=> $matrial->id,
         'category_id'=> $category->id,
         'day'=> $request['day'],
         'lecture'=> $request['lecture'],
         
         ]
     );
    

    return redirect()->back()->with(['status'=>'تمت الاضافة']) ;
    }



    protected function addBookingValidate($request){
       

        return $request = $request->validate([
           'name'=> 'required|string' ,
           'category'=>'required' ,
           'room'=>'required' ,
           'matrial'=>'required' ,
           'lecture'=>'required|integer' ,
           'day'=>'required|integer' ,
           'year'=>'required|integer' ,
           'section'=>'required|integer' ,
           
   
        ]);
    
    } 

    public function deleteBooking($id){

        Booking::find($id)->delete();
        return redirect()->back();
    }
    public function  editBooking($id,Request $request){
     $book = Booking::where('id',$id)->first();
     $book->update($request->all());
     return  $this->success([],'edit book success',200);

    }
}
