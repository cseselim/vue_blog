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


    public function savepost(Request $request){

        $this->validate($request,[
            'title'=>'required|min:2|max:50',
            'description'=>'required|min:2|max:1000'
        ]);
        /*$strpos = strpos($request->image,';');
        $sub = substr($request->image,0,$strpos);
        $ex = explode('/',$sub)[1];
        $name = time().".".$ex;
        $img = Image::make($request->image)->resize(200, 200);
        $upload_path = public_path()."/uploadimage/";
        $img->save($upload_path.$name);*/

        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->category_id = $request->category_id;
        if ($request->status == '') {
        	$post->status = 0;
        }else{
        	$post->status = $request->status;
        }
        $post->save();
    }

    public function deletepost($id)
    {
    	$data = Post::find($id);
        $data->delete();
    }



}
