<?php

namespace App\Http\Controllers;

use App\Models\ChildMenu;
use App\Models\Content;
use App\Models\Gallery;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $child = ChildMenu::where('id', $id)->first();
        $parrent = Menu::where('id', $child->parrent_id)->first();
        session(['id_parrent' => $parrent->id]);
        session(['id' => $id]);
        session()->forget('id_konten'); 

        // if session id_kontent
        $gallery = Gallery::where('id_main_menu', $parrent->id)->where('id_child_menu',$child->id)->get();

        return view('admin.gallery.index', compact(['gallery','child','parrent']));
         
    }

    public function GalleriKonten($id)
    {

        $child = ChildMenu::where('id', session()->get('id_child_menu'))->first();
        $parrent = Menu::where('id', $child->parrent_id)->first();
        $konten = Content::where('id', $id)->first();
        session(['id_child_menu' => $child->id]);
        session(['id_parrent' => $parrent->id]);
        session(['id_konten' => $id]);
        // if session id_kontent
        $gallery = Gallery::where('id_main_menu', $parrent->id)->where('id_child_menu',$child->id)->where('id_content', $id)->get();
        return view('admin.gallery.index', compact(['gallery','child','parrent','konten']));
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $child = ChildMenu::where('id', session()->get('id'))->first();
        $parrent = Menu::where('id', $child->parrent_id)->first();
        
        if (session()->get('id_konten')) {
            
            $konten = Content::where('id', session()->get('id_konten'))->first();
            return view('admin.gallery.create',compact(['parrent','child','konten']));
        }
        return view('admin.gallery.create',compact(['parrent','child']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $path = 'images/gallery';
        $file = $request->file('foto');
        $file_name = time() . "_" . $file->getClientOriginalName();
        $file->move($path, $file_name);
        $gallery = new Gallery();
        $gallery->title = $request->title;
        if(session()->get('id_konten')){
            $gallery->id_content = session()->get('id_konten');
        }
        $gallery->id_main_menu = session()->get('id_parrent');
        $gallery->id_child_menu = session()->get('id_child_menu');
        $gallery->image = $file_name;
        $gallery->save();

        if(session()->get('id_konten')){
            $id = session()->get('id_konten');
            session()->forget('id_konten'); 
            return redirect()->route('galleri.konten', $id)->with('success', 'Foto berhasil ditambahkan');
        }
        return redirect()->route('galleri.index', session()->get('id'))->with('success', 'Foto berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $child = ChildMenu::where('id', session()->get('id'))->first();
        $parrent = Menu::where('id', $child->parrent_id)->first();
        $gallery = Gallery::where('id', $id)->first();
        return view('admin.gallery.edit', compact(['gallery','child','parrent']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                        $gallery = Gallery::where('id', $id)->first();
                        $path = 'images/gallery';
                        $file = $request->file('foto');
                        //give if file null
                        if ($file == null) {
                            $file_name = $gallery->image;
                        } else {
                            unlink($path . '/' . $gallery->image);
                            $file_name = time() . "_" . $file->getClientOriginalName();
                            $file->move($path, $file_name);
                        }
                        $gallery->title = $request->title;
                        $gallery->id_main_menu = session()->get('id_parrent');
                        $gallery->id_child_menu = session()->get('id');
                        $gallery->image = $file_name;
                        $gallery->save();
                        return redirect()->route('galleri.index', session()->get('id'))->with('success', 'Foto berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                        $gallery = Gallery::where('id', $id)->first();
                        $path = 'images/gallery';
                        unlink($path . '/' . $gallery->image);
                        $gallery->delete();

                        if(session()->get('id_konten')){
                            $id = session()->get('id_konten');
                            session()->forget('id_konten'); 
                            return redirect()->route('galleri.konten', $id)->with('success', 'Foto berhasil dihapus');
                        }
                        return redirect()->route('galleri.index', session()->get('id'))->with('success', 'Foto berhasil dihapus');
    }
}
