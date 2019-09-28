<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
    	$allpost = Post::all();

    	return response()->json([
    		'allposts' => $allpost,
    	]);
    }

    public function postform()
    {
        return view('Admin.from');
    }

    public function savepost(Request $request){

        $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000',
            'image'=>'required',
        ]);

        $post = new Post();

        $strpos = strpos($request->image,';');
        $sub = substr($request->image,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->image)->resize(300, 300);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);
        
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->image = $name;

        if ($request->status == '') {
        	$post->status = 0;
        }else{
        	$post->status = $request->status;
        }
        $post->save();
        return redirect()->back();
    }

    public function editpost($id)
    {
        $post = Post::find($id);
        return response()->json([
            'post' => $post
        ]);
    }

    public function updatepost(Request $request,$id)
    {
        $post = Post::find($id);
        $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000'
        ]);


        if($request->image!=$post->image){
            $strpos = strpos($request->image,';');
            $sub = substr($request->image,0,$strpos);
            $ex = explode('/',$sub)[1];
            $name = time().".".$ex;
            $img = Image::make($request->image)->resize(300, 300);
            $upload_path = public_path()."/uploadimage/";
            $image = $upload_path. $post->image;
            $img->save($upload_path.$name);

            if(file_exists($image)){
                @unlink($image);
            }
        }else{
            $name = $post->image;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        $post->image = $name;
        $post->save();
    }

    public function deletepost($id)
    {
    	$post = Post::find($id);
        $image_path = public_path()."/uploadimage/";
        $image = $image_path. $post->image;
        if(file_exists($image)){
            @unlink($image);
        }
        $post->delete();
    }



}
