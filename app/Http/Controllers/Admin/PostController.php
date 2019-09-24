<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
}
