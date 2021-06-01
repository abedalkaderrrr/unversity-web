<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\Models\Advertisment;
use App\Models\Comment;
use App\Models\Matrial;
use App\Models\Post;
use App\Models\Project;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class postsController extends Controller
{
    public function index($id){
        $matrial = Matrial::find($id);
        $posts = Post::where('matrial_id',$id)->orderBy('updated_at','desc')->get();

        $matrials = Matrial::where('cat_name',$matrial->cat_name)->get();
        
        $arr = [];
        foreach($matrials as $item){
            $arr[] = $item->id;
        }
        
        $projects = Project::whereIn('matrial_id',$arr)->orderBy('updated_at','desc')->get();

        //$projects = Project::where('matrial_id',$id)->orderBy('updated_at','desc')->get();



        $advertisments = Advertisment::where('slice','Like','%'. $matrial->cat_name .'%')->orderBy('updated_at','desc')->take(5)->get();
      //  dd($advertisments);
        
        
       return view('students.posts',['matrial'=>$matrial,'posts'=>$posts,'projects'=>$projects,'advertisments'=>$advertisments]);





    }
    public function post(Request $request){
        $fileNameToStore = null ;
         if(! is_null($request->file('image'))){
        $filenameWithExt = $request->file('image')->getClientOriginalName ();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileNameToStore = $filename. '_'. time().'.'.$extension;
        $path = $request->file('image')->storeAs('public/photos', $fileNameToStore);
        
         
    }
   // dd($fileNameToStore);
    Post::create([
        'content'=>$request->content,
        'path' => $fileNameToStore,
        'user_id'=> Auth::id(),
        'matrial_id'=>$request->matrial_id,
    ]);
    return redirect()->back();
       // $post = Post::c
    }

    public function commit(Request $request){
        Comment::create([
            'post_id'=>$request->post_id,
            'user_id'=>Auth::id(),
            'content'=>$request->content,
        ]);
        return redirect()->back();

    }
    public function reply(Request $request){
        Reply::create([
            'comment_id'=>$request->comment_id,
            'user_id'=>Auth::id(),
            'content'=>$request->content,
        ]);
        return redirect()->back();

    }
    public function deletePost(Request $request){
        $post = Post::findOrFail($request->id);
        $post->delete();
        return redirect()->back();
    }
    public function edit(Request $request){
        $fileNameToStore = null ;
        if(! is_null($request->file('image'))){
       $filenameWithExt = $request->file('image')->getClientOriginalName ();
     
       $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
       $extension = $request->file('image')->getClientOriginalExtension();
       $fileNameToStore = $filename. '_'. time().'.'.$extension;
      // dd($fileNameToStore);
       $path = $request->file('image')->storeAs('public/photos', $fileNameToStore);
        }
        $post = Post::find($request->id);
        $post->update([
            'content'=>$request->content,
            'path'=> ($fileNameToStore == null) ? $post->path : $fileNameToStore ,
        ]);
       return  redirect()->back();
    }

}
