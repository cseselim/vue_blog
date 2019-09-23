<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    public function addcategory(Request $request)
    {
    	$store = new Category();

        $this->validate($request,[
        	'name' => 'required|min:3|max:10',
        ]);

        $store->name = $request->name;
        $store->status = $request->status;
        $store->save();
        return 'ok';


    }
}
