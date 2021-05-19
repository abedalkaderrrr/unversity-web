<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category ;
use App\Models\User ;
use App\Models\Role ;
use Illuminate\Support\Facades\DB;

//for export excel
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
//for import excel

use App\Imports\UsersImport;

class studentController extends Controller
{
    public function index() {
      
        $categories = Category::select('name')->distinct()->get();
        $categories = $categories->toArray();

        foreach ($categories as $value) {  $cat[] = $value['name'] ;   }
        return  $this->success($cat,'categories',200);
    }
    public function years($cat){
        $years = Category::select('year')->where('name',$cat)->get();
        $years = $years->toArray();

        foreach ($years as $value) {  $year[] = $value['year'] ;   }
        sort($year);
        return  $this->success($year,'years',200);

    }


    public function students($cat = 'computer',$year = 1){
          $categories = Category::select('name')->distinct()->get();  
          $students =DB::table('users')
                   ->join('categories', 'users.category_id', '=', 'categories.id')
                   ->where('categories.name',$cat)->where('categories.year',$year)->whereNotIn('users.role_id',['doctor'])
                   ->select('users.id','users.id_student','users.name','users.email','users.role_id','users.category_id')
                   ->get();
                   
     
       // return  $this->success($students,'students',200);
    //  dd($students);
        return view('dashboard.student-tabel',['student' => $students, 'categories'=>$categories,'catSelected'=>$cat,'yearSelected'=>$year]) ;
    }

    public function pageAddStudent($cat,$year){
        $categories = Category::select('name')->distinct()->get();
        $roles = Role::select('name')->get();

        return view('dashboard.stud-add',['category'=>$cat,'year'=>$year,'categories'=>$categories,'roles'=>$roles]);
    }

    public function addStudent(Request $request){
        $category_id = Category::where('section',$request->section)
        ->where('year',$request->year)->where('name',$request->category)->first();
        if(is_null($category_id)){
            return redirect()->back()->with(['status'=>'القسم غير موجود']);
        }
        
        $request = $this->vailateAddStudent($request);
        $user= User::create([
             'id_student'=> $request['id_student'] ,
             'name'=>$request['name'] , 
             'email'=> $request['email'],
             'password'=> bcrypt($request['password']),
             'role_id'=> $request['role_id'] ,
             'category_id'=>$category_id->id ,
              ]);
            return redirect()->to(route('pageAddStudent',['cat'=>$category_id->name , 'year'=>$category_id->year]))->with(['status' =>'تم اضافة طالب']);
              //return  $this->success($user,'add student',200);

        
            
    }
    protected function vailateAddStudent($request){
        return  $request->validate(
            [
                'id_student'=> 'required|unique:users|integer',
                'name'=> 'required',
                'email'=> 'required|email|unique:users',
                'password'=> 'required|min:6',
                'role_id'=> 'required|string',
                //'category_id'=> 'required|integer',
            ]
        );
    }

    public function deleteStudent($id){
       $user = User::where('id',$id)->delete();

       return redirect()->to(url()->previous());
 
     // return route('student.show') ;
       //return  $this->success([],'delete success',200);
    }
    public function pageEditStudent($id){
        $student = User::find($id);
        $categories = Category::select('name')->distinct()->get();
        $roles = Role::select('name')->get();
             
       //  dd($student->category->name);
        return view('dashboard.stud-edit',['student'=>$student,'categories'=>$categories,'roles'=>$roles]) ;
    }





    public function editStudent($id,Request $request){
       // dd($request->name);
      
     $user = User::where('id',$id)->first();
     $category_id = Category::where('section',$request->section)
     ->where('year',$request->year)->where('name',$request->category)->first()->id;
      $request->category_id = $category_id ;
   
     
     $request = $this->vailateeditStudent($request);
     $parameters = $request ;
     $parameters['category_id'] = $category_id ;
     // dd($parameters );
     $user->update($parameters);
     return redirect()->to(route('pageStudentEdit',['id'=>$id]))->with(['status' =>'تم تحديث البيانات']);
     
    // return  $this->success([],'edit success',200);
    }




    protected function vailateeditStudent($request){
      //  dd($request); 
        return  $request->validate(
            [
                'id_student'=> 'required|integer',
                'name'=> 'required',
                'email'=> 'required|email',
              //  'password'=> 'required|min:6',
                'role_id'=> 'required|string',
              //  'category_id'=> 'required|integer',
            ]
        );
    }

    
    public function deleteStudents($cat,$year){
        $students = Category::where('name',$cat)->where('year',$year)->get();
         $students  ;
         foreach ($students as  $student) {
             User::find($student->id)->delete();
            return  $this->success([],'delete success',200);
         }
       
    }
    public function exportStudentByExcel($cat,$year){
     
      return Excel::download(new UsersExport($cat,$year), 'users.xlsx');
     
    }
    public function importStudentByExcel ($cat,$year,Request $request){
      //  $path = $request->file()->getRealPath();
        $file = $request->users;
     //dd(request()->file('users')); 
     if(request()->file('users') == null ){return redirect()->back();}
      try {
        Excel::import(new UsersImport($cat,$year), request()->file('users'));
      } catch (\Exception $ex) {
        return redirect()->back()->with(['status'=>'something is wrong']);
      }
     
      
    }
    
}
