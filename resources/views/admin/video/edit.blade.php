@extends('layouts.backend')
@section('title_content') Tambah Gambar/Foto @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="#">{{$parrent->menu_name}}</i></a></li>
<li class="breadcrumb-item"><a href="{{route('video.index',$child->id)}}">{{$child->name}}</i></a></li>
@if (session()->has('id_konten'))
<li class="breadcrumb-item"><a href="{{route('video.konten',$konten->id)}}">{{$konten->title}}</i></a></li>
<li class="breadcrumb-item"><a href="{{route('video.edit',$video->id)}}">Edit</i></a></li>
@endif
@endsection
@section('content')
<div class="col-sm-12">
  <div class="card">
    <div class="card-header pb-0">
      <h4>Form Edit </h4>
    </div>
    <form class="form theme-form" method="post" action="{{route('video.update',$video->id)}}" enctype="multipart/form-data">
      <div class="card-body">
        @csrf
        <div class="col">
          <div class="mb-3">
            <label class="form-label" for="judul">Judul Foto</label>
            <input name="title" class="form-control" value="{{$video->title}}" id="judul" type="text" placeholder="Menu baru" data-bs-original-title="" title="">
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
            <label class="form-label" for="nama_menu">Video Baru</label>
            <input name="video" class="form-control" id="bagian" type="file" placeholder="Menu baru" data-bs-original-title="" title="">
          </div>
        </div>
        <div class="col">
          <div class="mb-3">
            <label class="" for="">Video Sebelumnya</label><br>
              <video width="320" height="240" controls>
                                <source src="{{asset("uploads/video/$video->video")}}" type="video/mp4">
                              Your browser does not support the video tag.
              </video>
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