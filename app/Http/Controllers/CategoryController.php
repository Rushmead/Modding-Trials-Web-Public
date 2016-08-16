<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Category;
class CategoryController extends Controller
{
    public function newPage(Request $requets){
        return view('admin.categories.new');
    }
    
    public function create(Request $request){
        $newCategory = new Category;
        $newCategory->name = $request->name;
        $newCategory->description = $request->description;
        $newCategory->save();
        return json_encode(array('success' => true));
    }

    public function remove(Request $request){
        $category = Category::where('id', $request->id)->first();
        $category->delete();
        return redirect('/admin');
    }

    public function editPage(Request $request){
        return view('admin.categories.edit')->with('category', Category::where('id', $request->id)->first());
    }

    public function save(Request $request){
        $category = Category::where('id', $request->id)->first();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return json_encode(array('success' => true));
    }
}
