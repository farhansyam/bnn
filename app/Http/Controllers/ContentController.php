<?php

namespace App\Http\Controllers;

use App\Models\ChildMenu;
use App\Models\Menu;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ContentController extends Controller
{
    public function index()
    {
        $content = Content::all();
        return view('admin.content.index', compact(['content']));
    }

    public function create()
    {   
        $parrent = Menu::where('id', session()->get('parrent_id'))->first();
        $childMenu = ChildMenu::where('id', session()->get('id_child_menu'))->first();
        return view('admin.content.create', compact(['parrent', 'childMenu']));
    }

    public function store(Request $request)
    {
        $content = new Content();
        $content->title = $request->title;
        $content->menu_id = session()->get('parrent_id');
        $content->child_menu_id = session()->get('id_child_menu');
        $content->image = $request->image;
        $content->status = $request->status;
        $content->type = $request->type;
        $content->save();
        //return with route name
        return redirect()->route('sub-menu.detail',session()->get('id_child_menu'))->with('success', 'Content berhasil ditambahkan');
    }

    public function edit($id)
    {
        $content = Content::find($id);
        $parrent = Menu::where('id', session()->get('parrent_id'))->first();
        $childMenu = ChildMenu::where('id', session()->get('id_child_menu'))->first();
        return view('admin.content.edit', compact(['content', 'parrent', 'childMenu']));
    }

    public function update(Request $request, $id)
    {
        $content = Content::find($id);
        $content->title = $request->title;
        $content->menu_id = session()->get('parrent_id');
        $content->child_menu_id = session()->get('id_child_menu');
        $content->status = $request->status;
        $content->type = $request->type;
        $content->save();
        return redirect()->route('sub-menu.detail',session()->get('id_child_menu'))->with('success', 'Content berhasil diedit');
    }

    public function delete($id)
    {
        $content = Content::find($id);
        $content->delete();
        return redirect()->route('sub-menu.detail', session()->get('id_child_menu'))->with('success', 'Content berhasil dihapus');
    }

    public function detail($id)
    {
        $content = Content::find($id);
        return view('admin.content.detail', compact(['content']));
    }

}
