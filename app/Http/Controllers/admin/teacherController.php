<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category ;
use App\Models\Matrial;
use App\Models\User ;
use App\Models\Role ;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

use function PHPUnit\Framework\isNull;

class teacherController extends Controller
{
    public function index(){
        $doctors = User::where('role_id','doctor')->get(['id','name','email']);
        
        return  view('dashboard.teacher-tabel',['teachers'=>$doctors]);
        //  return  $this->success($doctors,'doctors',200);
      }
  
      public function addDoctor(Request $request){
          $request = $this->vailateAddDoctor($request);
          $user= User::create([
             //  'id_student'=> $request['id_student'] ,
               'name'=>$request['name'] , 
               'email'=> $request['email'],
               'password'=> bcrypt($request['password']),
               'role_id'=> 'doctor' ,
               'category_id'=> 1,
                ]);
          return  $this->success($user,'add doctor',200);
  
          
              
      }
      protected function vailateAddDoctor($request){
          return  $request->validate(
              [
                  //'id_student'=> 'required|integer',
                  'name'=> 'required',
                  'email'=> 'required|email|unique:users',
                  'password'=> 'required|min:6',
                  //'role_id'=> 'required|integer',
                  //'category_id'=> 'required|integer',
              ]
          );}
      
          public function deleteDoctor($id){
              $user = User::where('id',$id)->delete();
              return redirect()->back();
              //return  $this->success([],'delete success',200);
           }
           
           public function pageEeitTeacher($id){
            $user = User::where('id',$id)->first();
            return view('dashboard.teach-edit',['teacher'=>$user]);
           }

           public function editDoctor($id,Request $request){
              $user = User::where('id',$id)->first();
             
              if(isNull($request->password)){
                $request->password = $user->password ;
               
              }
              $request = $this->vailateeditDoctor($request);
              
              $user->update($request);
              return redirect()->back()->with(['status'=>'تم التحديث']);
             
             }
  
             protected function vailateeditDoctor($request){
              return  $request->validate(
                  [
                     // 'id_student'=> 'required|unique:users|integer',
                      'name'=> 'required',
                      'email'=> 'required|email',
                      //'password'=> 'required|min:6',
                     // 'role_id'=> 'required|integer',
                      //'category_id'=> 'required|integer',
                  ]
              );
            }
            public function addTeacher(){
                return view('dashboard.teach-add');
            }
            public function createTeacher(Request $request){
                
                $request = $this->vailateAddTeacher($request);
               User::create([
             'id_student'=> 0 ,
             'name'=>$request['name'] , 
             'email'=> $request['email'],
             'password'=> bcrypt($request['password']),
             'role_id'=> 'doctor' ,
             'category_id'=> null ,
              ]);
            return redirect()->to(route('teacher.add'))->with(['status'=>'تم اضافة المدرس']);
              


            }
            protected function vailateAddTeacher($request){
                return  $request->validate(
                    [
                       // 'id_student'=> 'required|unique:users|integer',
                        'name'=> 'required',
                        'email'=> 'required|email|unique:users',
                        'password'=> 'required|min:6',
                     //   'role_id'=> 'required|string',
                        //'category_id'=> 'required|integer',
                    ]
                );
            }
            
          public function addDoctorMatrial($id,$matrial){
            
              $doctorId =User::find($id)->id;
              
              DB::insert("insert into matrial_user(user_id,matrial_id) values ($doctorId, $matrial)");
              return redirect()->back();
          }
          public function deleteDoctorMatrail($id,$matrial){
            
              $doctorId =User::find($id)->id;
             
             
              DB::delete("delete from matrial_user where user_id = $doctorId  AND matrial_id = $matrial");
              
              return  redirect()->back();
          }
          public function subjectPage($id){
            $user = User::find($id);
            $matrialsUser = $user->matrials;
            $matrialId[] = -1;
            foreach($matrialsUser as $item){
                $matrialId[]=$item->id;
            }
            
         //   $com = compact($matrialsUser);
           $matrials = Matrial::whereNotIn('id',$matrialId )->get();
           // dd($matrials);
              return view('dashboard.subject',['user'=>$user,'matrialsUser'=>$matrialsUser,'matrials'=>$matrials]);
          }         
}
