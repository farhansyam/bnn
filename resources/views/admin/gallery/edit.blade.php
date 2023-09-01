@extends('layouts.backend')
@section('title_content') Edit Gambar/Foto @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('menu.detail',$parrent->id)}}">{{$parrent->menu_name}}</i></a></li>
<li class="breadcrumb-item"><a href="#">{{$parrent->menu_name}}</i></a></li>
<li class="breadcrumb-item"><a href="{{route('galleri.index',$child->id)}}">{{$child->name}}</i></a></li>
@endsection
@Section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-header pb-0">
      <h4>Form Input</h4>
    </div>
    <form class="form theme-form" method="post" action="{{route('galleri.update',$gallery->id)}}" enctype="multipart/form-data">
      <div class="card-body">
        @csrf
        <div class="col">
          <div class="mb-3">
            <label class="form-label" for="judul">Judul Foto</label>
            <input name="title" class="form-control" value="{{$gallery->title}}" id="judul" type="text" placeholder="Menu baru" data-bs-original-title="" title="">
          </div>
        </div>
        <div class="col">
          <div class="mb-3">
            <label class="form-label" for="nama_menu">Bagian</label>
            <input name="parrent_id" value="{{$parrent->menu_name}} -> {{$child->name}}" class="form-control" id="bagian" type="text" disabled placeholder="Menu baru" data-bs-original-title="" title="">
          </div>
        </div>

        {{-- baru --}}
        <div class="col">
          <div class="mb-3">
            <label class="form-label" for="nama_menu">Foto Baru</label>
            <input name="foto" class="form-control" id="bagian" type="file" placeholder="Menu baru" data-bs-original-title="" title="">
          </div>
        </div>
        <div class="col">
          <div class="mb-3">
            <label class="" for="">Foto Sebelumnya</label><br>
            <img height="200" src="{{asset('images/gallery/'.$gallery->image)}}">
          </div>
        </div>
        <br>
        <br>
        <button class="btn btn-primary" type="submit" data-bs-original-title="" title="">Submit</button>
      </div>
  </div>
  </form>
</div>
</div>
@endsection