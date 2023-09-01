<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Content;
use App\Models\ChildMenu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubMenuController extends Controller
{
    public function index()
    {
        $subMenu = ChildMenu::with('menu')->get();
        return view('admin.sub-menu.index', compact(['subMenu']));
    }

    public function create()
    {
        $menus = Menu::all();
        return view('admin.sub-menu.create', compact(['menus']));
    }

    public function store(Request $request)
    {
        $subMenu = new ChildMenu();
        $subMenu->parrent_id = session()->get('parrent_id');
        $subMenu->type = $request->type;
        $menu_link = strtolower($request->name);
        $menu_link = str_replace(' ', '-', $menu_link);
        $subMenu->name = $request->name;
        $subMenu->status = $request->status;
        $subMenu->link = $menu_link;
        $subMenu->save();
        //return with route name
        return redirect()->route('menu.detail',session()->get('parrent_id'))->with('success', 'Menu berhasil ditambahkan');
    }

    public function edit($id)
    {
        $sub = ChildMenu::find($id);
        $menus = Menu::find(session()->get('parrent_id'));
        return view('admin.sub-menu.edit', compact(['sub', 'menus']));
    }

    public function update(Request $request, $id)
    {
        $subMenu = ChildMenu::find($id);
        $subMenu->parrent_id = session()->get('parrent_id');
        $subMenu->type = $request->type;
        $menu_link = strtolower($request->name);
        $menu_link = str_replace(' ', '-', $menu_link);
        $subMenu->name = $request->name;
        $subMenu->status = $request->status;
        $subMenu->link = $menu_link;
        $subMenu->save();
        return redirect()->route('menu.detail', session()->get('parrent_id'))->with('success', 'Menu berhasil diedit');
    }

    public function delete($id)
    {
        $subMenu = ChildMenu::find($id);
        $subMenu->delete();
        return back()->with('success', 'Menu berhasil dihapus');
    }

    public function detail($id)
    {
        //detail menu

        $parrent = Menu::find(session()->get('parrent_id'));
        $child = ChildMenu::with(['content'])->find($id);
        session(['id_child_menu' => $id]);
        $content = Content::where('child_menu_id', $id)->get();
        return view('admin.sub-menu.detail', compact(['child', 'content','parrent']));
    }
}
