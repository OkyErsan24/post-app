<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::all();
        
        return view('category.index', ['categories' => $data]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request){
        $category = new Category;

        $category->title = $request->title;
        $category->slug = str_replace(' ', '-' , $request->title);
        $extension = $request->file('image')->getClientOriginalExtension();
        $image = time() . '.' . $extension;
        $request->file('image')->move(public_path('images/category'), $image);
        $category->image = $image;
        $category->save();
        return redirect('/category')->with('status' , 'Add Category');
    }

    public function edit($slug)
    {
        $data = Category::where('slug', $slug)->first();
        return view('category.edit' , ['category' => $data]);
    }

    public function update($slug, Request $request)
    {
        $category = Category::where('slug', $slug)->first();
        $category->title = $request->title;
        $category->slug = str_replace(' ', '-' , $request->title);
        if($request->hasFile('image')){
            $file = public_path() . '/images/category/' . $category->image;
            File::delete($file);
            $extension = $request->file('image')->getClientOriginalExtension();
            $image = time() . '.' . $extension;
            $request->file('image')->move(public_path('images/category'), $image);
            $category->image = $image;
        }
        $category->save();
        return redirect('/category')->with('status' , 'Edit Category');
    }

    public function delete($slug)
    {
        $category = Category::where('slug' , $slug)->first();
        $file = public_path() . '/images/category/' . $category->image;
        
        if(File::exists($file)) {
            File::delete($file);
            $delete = $category->delete();
            if($delete){
                return redirect('/category')->with('status', 'Delete Data');
            }else{
                return redirect('/category')->with('error', 'Delete Failed');
            }
        }
    }
}