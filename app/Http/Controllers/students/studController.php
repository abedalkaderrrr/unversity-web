<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\Booking;
use App\Models\Category;
use App\Models\Matrial;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class studController extends Controller
{
    public function index(){
       
        $cat_name = Category::find(Auth::user()->category_id)->catId;
        $matrial = Matrial::where('cat_name',$cat_name)->get();
     //   dd($matrial);
     $book = Booking::where('category_id',Auth::user()->category_id)->get();
     
       // dd($book->lecture);
       $arr= [];
        for ($i=1 ; $i <6 ; $i++) { 
            for ($j=1 ; $j <6 ; $j++) { 
                
                $arr[$i][$j] = null ;
            
            }
        }

      
       foreach ($book as $item) {
          // dd($item);
           $day = $item->day ;
           $lec = $item->lecture ;
           $arr[$day][$lec] = $item;

       }   
      // dd($arr);
       $days[1]= 'الاحد';
       $days[2]= 'الاثنين';
       $days[3]= 'الثلاثاء';
       $days[4]= 'الاربعاء';
       $days[5]= 'الخميس'; 
      
        return view('students.main',['matrials'=>$matrial,'bookings'=> $arr,'days'=>$days,'category'=>$cat_name]);
    }
    public function  advertisments($category){
        $advertisments = Advertisment::where('slice','like','%'.$category.'%')->where('period','>',Carbon::now()->format('Y-m-d'))->orderBy('created_at','desc')->get();
       //dd(Carbon::now() );
      return  view('students.advertisments',['advertisments'=>$advertisments]);
    }
    public function projects($category){
       
      
        $matrial = Matrial::where('cat_name',$category)->get();
        
        $arr = [];
        foreach($matrial as $item){
            $arr[] = $item->id;
        }
        
        $projects = Project::whereIn('matrial_id',$arr)->get();
        
        //dd();
        return view('students.projects',['projects'=>$projects]);
      
        
    }




    public function uploadProject(Request $request){
        $user = User::find(Auth::id());
        $check = DB::table('project_user')->where('user_id',Auth::id())->where('project_id',$request->id)->first();
        
      if($check){
       DB::table('project_user')->where('id',$check->id)->delete();
      }
        
       
        $filenameWithExt = $request->file('project')->getClientOriginalName ();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('project')->getClientOriginalExtension();
        $fileNameToStore = $filename. '_'. time().'.'.$extension;
        $path = $request->file('project')->storeAs('public/project_files', $fileNameToStore);
        $user->projects()->attach($request->id,['path'=>$fileNameToStore]);
        
        return redirect()->back() ;

    }
    public function myPosts(){
        $posts = Post::where('user_id',Auth::id())->orderBy('updated_at','desc')->get();
        return view('students.myPosts',['posts'=>$posts]);
    }
    public function profile(){
       // dd(public_path());
        return view('students.editprofile');
    }
}
