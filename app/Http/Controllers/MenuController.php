<?php

namespace App\Http\Controllers;

use App\Models\tbl_menu;
use App\Models\tbl_category;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function allMenu()
    {
        $menus = tbl_menu::whereHas('category', function ($query) {
            $query->where('isActive', 'Yes');
        })->with('category')->get();
        $categories = tbl_category::where('isActive', 'Yes')->get();
        // $categories = tbl_category::get();
        $display = 'menus.index';
        return view($display, compact('menus','categories'));
    }
    public function add()
    {
        $menus = tbl_menu::whereHas('category', function ($query) {
            $query->where('isActive', 'Yes');
        })->with('category')->get();
        $categories = tbl_category::where('isActive', 'Yes')->get();
        $display = 'menus.create';
        return view($display, compact('menus','categories'));
    }
    public function create()
{
    // Display the form for creating a new menu
    $categories = tbl_category::where('isActive', 'Yes')->get();
    return view('menus.create', compact('categories'));
}
    public function getMenuById($id)
    {
        $categories = tbl_category::where('isActive', 'Yes')->get();
        $menu = tbl_menu::with('category')->findOrFail($id); 
        return view('menus.create', compact('menu','categories'));
    }
    public function store(Request $request)
{
    // Validate the form data
    $request->validate([
        'name' => 'required',
        'desc' => 'required',
        'price' => 'required|numeric',
        'categoryID' => 'required|exists:tbl_categories,id',
        'isActive' => 'required|in:Yes,No',
    ]);

    // Create a new menu instance and save it
    $menu = new tbl_menu();
    $menu->name = $request->name;
    $menu->desc = $request->desc;
    $menu->price = $request->price;
    $menu->categoryID = $request->categoryID;
    $menu->isActive = $request->isActive;
    $menu->save();

    return redirect()->route('menus')->with('success', 'Menu created successfully.');
}

    // public function update(Request $request)
    // {
        
    //     $menu_data = $request->all();
    //     $menu = tbl_menu::where('id',$request->id)->first();
    //     $menu->update($menu_data);

    //     return $menu;
    // }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'desc' => 'required|string',
            'price' => 'required|numeric',
            'categoryID' => 'required|exists:tbl_categories,id',
            'isActive' => 'required|in:Yes,No',
        ]);
        $menu = tbl_menu::findOrFail($id);
        $menu->update($validatedData);
        return redirect()->route('menus')->with('success', 'Menu updated successfully!');
    }

    public function delete($id)
    {
        $menu = tbl_menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('allMenu');
    }

    
    
}
