<?php

namespace App\Http\Controllers;

use App\Models\tbl_menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function create(Request $menu)
    {
        return tbl_menu::create([
            'name' =>$menu->name,
            'desc' =>$menu->desc,
            'price' =>$menu->price,
            'categoryID' =>$menu->categoryID,
            'isActive' =>$menu->isActive,
        ]);
    }

    public function update(Request $request)
    {
        $menu_data = $request->all();
        $menu = tbl_menu::where('id',$request->id)->first();
        $menu->update($menu_data);

        return $menu;
    }

    public function delete($id)
    {
        return tbl_menu::where('id',$id)->delete();
    }

    public function allMenu()
    {
        $menus = tbl_menu::with('category')->get();
        // foreach ($menus as $key => $value) {
        //     $menus[$key]->category = $value->category->main_course;
        // }
        // $menus = tbl_menu::get();
        $display = 'menus.index';
        return view($display, compact('menus'));
    }
}
