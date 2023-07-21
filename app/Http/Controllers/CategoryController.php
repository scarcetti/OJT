<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
// use App\Models\tbl_menu;
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
        $category = new tbl_category();
        $category->main_course = $request->main_course;
        $category->isActive = $request->isActive;
        $category->save();
        return redirect()->route('categories');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'main_course' => 'required|string',
            'isActive' => 'required|in:Yes,No',
        ]);
        $category = tbl_category::findOrFail($id);
        $category->update($validatedData);
        return redirect()->route('categories')->with('success', 'Category updated successfully!');
    }
    public function delete($id)
    {
        $category = tbl_category::findOrFail($id);
        $category->delete();
        return redirect()->route('allCategory');
    }

    public function all()
    {
        $categories = tbl_category::get();
        $display = 'categories.index';
        return view($display, compact('categories'));
    }
    public function getCategoryById($id)
    {
        $category = tbl_category::findOrFail($id); 
        return view('categories.create', compact('category'));
    }
    
    
    public function allID()
    {
        $categories = tbl_category::get();
        $display = 'menus.create';
        return view($display, compact('categories'));
    }
}
