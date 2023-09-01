<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\ChildMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menu.index',compact(['menus']));
    }

    
    public function create()
    {
        return view('admin.menu.create');
    }

    
    public function store(Request $request)
    {
        // store data menu input
        $menu = new Menu();
        $menu->menu_name = $request->menu_name;
        $menu->menu_status = $request->menu_status;

        //slug format for menu_link str tomlower and separate with -
        $menu_link = strtolower($request->menu_name);
        $menu_link = str_replace(' ', '-', $menu_link);
        $menu->menu_link = $menu_link;
        $menu->menu_link = $menu_link;
        
        $menu->save();

        return redirect()->back()->with('success','Menu berhasil ditambahkan');

    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //edit menu
        $menu = Menu::find($id);
        return view('admin.menu.edit',compact(['menu']));
    }

    
    public function update(Request $request, $id)
    {
        //update menu
        $menu = Menu::find($id);
        $menu->menu_name = $request->menu_name;
        $menu->menu_status = $request->menu_status;

        //slug format for menu_link str tomlower and separate with -
        $menu_link = strtolower($request->menu_name);
        $menu_link = str_replace(' ', '-', $menu_link);
        $menu->menu_link = $menu_link;
        $menu->menu_link = $menu_link;
        
        $menu->save();

        return redirect('/admin/menu')->with('success','Menu berhasil diupdate');
    }

   
    public function delete($id)
    {
        //delete menu
        $menu = Menu::find($id);
        $menu->delete();
        return redirect('/admin/menu')->with('success','Menu berhasil dihapus');

    }

    public function detail($id)
    {
        //detail menu
        
        $menu = Menu::with(['childMenu'])->find($id);
        session(['parrent_id' => $id]);
        $subMenu = ChildMenu::where('parrent_id',$id)->get();
        return view('admin.menu.detail',compact(['menu','subMenu']));
    }
}
