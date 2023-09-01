@extends('layouts.backend')
@section('title_content') Tambah Gambar/Foto @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">{{$parrent->menu_name}}</i></a></li>
<li class="breadcrumb-item"><a href="{{route('galleri.index',$child->id)}}">{{$child->name}}</i></a></li>
@if (session()->has('id_konten'))
<li class="breadcrumb-item"><a href="{{route('galleri.konten',$konten->id)}}">{{$konten->title}}</i></a></li>
<li class="breadcrumb-item"><a href="{{route('galleri.create')}}">Create</i></a></li>
@endif
@endsection
@Section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-header pb-0">
      <h4>Form Input</h4>
    </div>
    <form class="form theme-form" method="post" action="{{route('galleri.store')}}" enctype="multipart/form-data">
      <div class="card-body">
        @csrf
        <div class="col">
          <div class="mb-3">
            <label class="form-label" for="judul">Judul Foto</label>
            <input name="title" required class="form-control" id="judul" type="text" placeholder="Menu baru" data-bs-original-title="" title="">
          </div>
        </div>
        <div class="col">
          <div class="mb-3">
            <label class="form-label" for="nama_menu">Bagian</label>
            @if(session()->has('id_konten'))
            <input name="parrent_id" value="{{$parrent->menu_name}} -> {{$child->name}} -> {{$konten->title}}" class="form-control" id="bagian" type="text" disabled placeholder="Menu baru" data-bs-original-title="" title="">
            @else
            <input name="parrent_id" value="{{$parrent->menu_name}} -> {{$child->name}}" class="form-control" id="bagian" type="text" disabled placeholder="Menu baru" data-bs-original-title="" title="">
            @endif
          </div>
        </div>
        <div class="col">
          <div class="mb-3">
            <label class="form-label" for="nama_menu">Foto</label>
            <input name="foto" class="form-control" id="bagian" type="file" placeholder="Menu baru" data-bs-original-title="" title="">
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