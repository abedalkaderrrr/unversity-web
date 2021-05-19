<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Matrial;

class matrialController extends Controller
{
    public function index(){
        $matrials = Matrial::all();
        return view('dashboard.matrial-table',['matrials'=>$matrials]);
    }
    public function deleteMatrial($id){
        $matrial = Matrial::findOrFail($id)->users()->detach();
        Matrial::find($id)->delete();
        return redirect()->back();

    }
    public function addmatrial(Request $request){
        $request->validate([
            'name'=> 'required | string',
            'cat_name'=> 'required',
            'term'=> 'required | integer',
        ]);
        $matrial = Matrial::create($request->all());
        return redirect()->back()->with(['status'=>'تمت الاضافة بنجاح']);
    }
}
