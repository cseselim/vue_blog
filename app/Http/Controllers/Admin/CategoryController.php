<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
    }

    public function allcategory()
    {
        $categories = Category::all();

        return response()->json([
            'categories' => $categories
        ]);
    }

    public function editcategory($id)
    {
        $category = Category::find($id);
        return response()->json([
            'category' => $category
        ]);
    }

    public function deletecategory($id)
    {
        $data = Category::find($id);
        $data->delete();
    }

    public function updatecategory(Request $request, $id)
    {
        $updatecat = Category::findOrFail($id);

        $this->validate($request,[
            'name' => 'required|min:3|max:10',
        ]);

        $updatecat->name = $request->name;
        $updatecat->status = $request->status;
        $updatecat->save();
    }
}
