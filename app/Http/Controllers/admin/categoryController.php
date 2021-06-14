<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{
    public function index(){
        $category = Category::all(['id','name','year','section']);
        return view('dashboard.department-tabel',['categories'=>$category]);
        //return  $this->success($category,'categories',200);
    }
    public function addCategory(Request $request){
        $request->validate(
            ['year'=>'integer|required',
             'section'=>'integer|required',
             'name'=>'string|required',
             'catId'=>'required',
  
           ]
       );
     $category= Category::create([
        'catId'=>$request['catId'] , 
        'name'=>$request['name'] ,
        'year'=>$request['year'] ,
        'section'=>$request['section'] ,
        
     ]);
     return  redirect()->back()->with(['status'=> 'تم الاضافة']);
    }

    public function deleteCategory($id){

        Category::find($id)->delete();
      return redirect()->back();
    }
    public function  editCategory($id,Request $request){
     $category = Category::where('id',$id)->first();
     $request->validate(
          ['year'=>'integer',
           'section'=>'integer',
           'name'=>'string',

         ]
     );
     $category->update($request->all());
     return  redirect()->back()->with(['status'=>'تم تعديل بيانات القسم']);

    }
    public function editPageCategory($id){
        $category = Category::findOrfail($id);
     return view('dashboard.dep-edit',['category'=>$category]);
    }
}
