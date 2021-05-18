<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisment ;
use Carbon\Carbon ;

class advrtismentController extends Controller
{
    public function index(){
        $adver = Advertisment::where('period','>',Carbon::now())->get();

        return  view('dashboard.advertisment-tabel',['advertisment'=>$adver]);
    }

    public function adddAvertisment(Request $request){
        $request = $this->advertismentValidate($request);
         $adver= Advertisment::create([
        'title'=>$request['title'] ,
        'content'=>$request['content'] ,
        'period'=>$request['period'] ,
        'slice'=>$request['slice'],
        'user_id'=> null,
        
        
     ]);
     return  redirect()->back()->with(['status'=>'تم اضافة الاعلان']);
    }
    protected function advertismentValidate($request){
     return $request->validate([
        'title'=> 'required|string' ,
        'content'=>'required|string' ,
        'period'=>'required|date_format:Y-m-d' ,
        'slice'=>'required' ,

     ]);
    } 

    public function deleteAdvertisment($id){

        Advertisment::find($id)->delete();
        return redirect()->back();
        //return  $this->success([],'delete Advertisment',200);
    }

    public function  editAdvertisment($id,Request $request){
     $adver = Advertisment::where('id',$id)->first();
     $request->validate([
         'title'=>'required',
         'content'=>'required',
         'slice'=>'required',
         'period'=>'required',
     ]);
     $adver->update($request->all());
     return  redirect()->back()->with(['status'=>'تم تعديل الاعلان']);

    }
    public function editPageAdvertisment($id){
      $adver = Advertisment::where('id',$id)->first();
      return view('dashboard.advert-edit',['advertisment'=>$adver]);
    }
}
