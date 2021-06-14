<?php

namespace App\Http\Controllers\marks;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Mark;
use App\Models\Matrial;
use Illuminate\Http\Request;
use App\Imports\MarksImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class marksController extends Controller
{
    public function index(){
       $category = Category::all();
        return view('marks.upload' , ['category'=>$category]);
    }
    public function selectMatrial(Request $request){
        $matrials = Matrial::where('cat_name',$request->cat_name)->get();
     //   dd($matrials);
        $category = Category::all();
        return view('marks.upload' , ['category'=>$category,'matrials'=>$matrials]);
    }
    public function upload(Request $request){
        

       
       
       try {
            Excel::import(new MarksImport($request->matrial_id), $request->file('marks'));
           // dd('gaga');
           return redirect()->route('marks.upload');

           } catch (\Exception $ex) {
            return redirect()->route('marks.upload');
           }
    }

    public function marks(){
        $marks = Mark::where('user_id', Auth::user()->id_student)->orderBy('updated_at','desc')->get()->unique('matrial_id');

      
        return view('marks.studentMarks',['marks'=>$marks]);
    }
}
