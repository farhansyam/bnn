<?php

namespace App\Http\Controllers;

use App\Models\ChildMenu;
use App\Models\Content;
use App\Models\Video;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VideoController extends Controller
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
        $videos = Video::where('id_main_menu', $parrent->id)->where('id_child_menu', $child->id)->get();

        return view('admin.Video.index', compact(['videos', 'child', 'parrent']));
    }

    public function VideoKonten($id)
    {

        $child = ChildMenu::where('id', session()->get('id_child_menu'))->first();
        $parrent = Menu::where('id', $child->parrent_id)->first();
        $konten = Content::where('id', $id)->first();
        session(['id_child_menu' => $child->id]);
        session(['id_parrent' => $parrent->id]);
        session(['id_konten' => $id]);
        // if session id_kontent
        $videos = Video::where('id_main_menu', $parrent->id)->where('id_child_menu', $child->id)->where('id_content', $id)->get();
        return view('admin.Video.index', compact(['videos', 'child', 'parrent', 'konten']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $child = ChildMenu::where('id', session()->get('id_child_menu'))->first();
        $parrent = Menu::where('id', $child->parrent_id)->first();

        if (session()->get('id_konten')) {

            $konten = Content::where('id', session()->get('id_konten'))->first();
            return view('admin.Video.create', compact(['parrent', 'child', 'konten']));
        }
        return view('admin.Video.create', compact(['parrent', 'child']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('video');
        $path = 'uploads/video';
        $file_name = time() . "_" . $file->getClientOriginalName();
        $file->move($path, $file_name);
        $Video = new Video();
        $Video->title = $request->title;
        if (session()->get('id_konten')) {
            $Video->id_content = session()->get('id_konten');
        }
        $Video->id_main_menu = session()->get('id_parrent');
        $Video->id_child_menu = session()->get('id_child_menu');
        $Video->video = $file_name;
        // $Video->description = $request->deskripsi;
        // $Video->status = $request->status    ;
        $Video->save();

        if (session()->get('id_konten')) {
            $id = session()->get('id_konten');
            session()->forget('id_konten');
            return redirect()->route('video.konten', $id)->with('success', 'video berhasil ditambahkan');
        }
        return redirect()->route('video.index', session()->get('id'))->with('success', 'video berhasil ditambahkan');
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
        $child = ChildMenu::where('id', session()->get('id_child_menu'))->first();
        $parrent = Menu::where('id', $child->parrent_id)->first();
        $video = Video::where('id', $id)->first();
        if (session()->get('id_konten')) {

            $konten = Content::where('id', session()->get('id_konten'))->first();
            return view('admin.Video.edit', compact(['video', 'child', 'parrent', 'konten']));

        return view('admin.Video.edit', compact(['video', 'child', 'parrent']));
    }
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
        $Video = Video::where('id', $id)->first();
        $path = 'images/Video';
        $file = $request->file('video');
        //give if file null
        if ($file == null) {
            $file_name = $Video->video;
        } else {
            unlink($path . '/' . $Video->image);
            $file_name = time() . "_" . $file->getClientOriginalName();
            $file->move($path, $file_name);
        }
        $Video->title = $request->title;
        $Video->id_main_menu = session()->get('id_parrent');
        $Video->id_child_menu = session()->get('id_child_menu');
        $Video->video = $file_name;
        $Video->save();
        if (session()->get('id_konten')) {
            $id = session()->get('id_konten');
            session()->forget('id_konten');
            return redirect()->route('video.konten', $id)->with('success', 'Foto berhasil ditambahkan');
        }
        return redirect()->route('video.index', session()->get('id'))->with('success', 'Foto berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Video = Video::where('id', $id)->first();
        $path = 'uploads/video';
        unlink($path . '/' . $Video->video);
        $Video->delete();

        if (session()->get('id_konten')) {
            $id = session()->get('id_konten');
            session()->forget('id_konten');
            return redirect()->route('video.konten', $id)->with('success', 'video berhasil dihapus');
        }
        return redirect()->route('video.index', session()->get('id'))->with('success', 'video berhasil dihapus');
    }
}
