<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function add()
    {
        // $categories = tbl_category::get();
        $display = 'categories.create';
        return view($display);
    }

    public function create(Request $request)
    {
       /*  return tbl_category::create([
            'main_course' =>$category->main_course,
            'isActive'=> $category->isActive
        ]); */
        $category = new tbl_category();
        $category->main_course = $request->main_course;
        $category->isActive = $request->isActive;
        $category->save();
        return redirect()->route('categories');
    }

    public function update(Request $request)
    {
        $category_data = $request->all();
        $category = tbl_category::where('id',$request->id)->first();
        $category->update($category_data);
        $display = 'categories.update';

        return $category;
    }

    public function delete($id)
    {
        return tbl_category::where('id',$id)->delete();
    }

    public function all()
    {
        $categories = tbl_category::get();
        $display = 'categories.index';
        return view($display, compact('categories'));
    }
    
    
    public function allID()
    {
        $categories = tbl_category::get();
        $display = 'menus.create';
        return view($display, compact('categories'));
       /*  return $categories; */
    }
}
