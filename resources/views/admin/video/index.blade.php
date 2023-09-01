@extends('layouts.backend')
@section('title_content') List Video  @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('menu.detail',$parrent->id)}}">{{$parrent->menu_name}}</i></a></li>
<li class="breadcrumb-item"><a href="{{route('sub-menu.detail',$child->id)}}">{{$child->name}}</i></a></li>
@if (session()->has('id_konten'))
<li class="breadcrumb-item"><a href="{{route('video.konten',$konten->id)}}">{{$konten->title}}</i></a></li>
@endif
@endsection
@Section('content')
<div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                  <a href="{{route('video.create')}}" ><button class="btn btn-primary" type="button" data-bs-original-title="" title="">Tambah Video</button></a>
                  <br>
                  <br>
                  @if(session()->has('id_konten'))
                    <h4>Daftar List Isi {{$konten->title}}</h4><span>Dalam tabel dibawah ini adalah daftar list video</span>
                  @else
                    <h4>Daftar List Isi {{$child->name}}</h4><span>Dalam tabel dibawah ini adalah daftar list video</span>
                  @endif
                  </div>
                  <div class="table-responsive theme-scrollbar">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Video</th>
                          <th scope="col">Judul</th>
                          <th scope="col">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($videos as $video)
                          
                        <tr>
                          <th scope="row">{{$no++}}</th>
                          <td scope="row">
                          <video width="320" height="240" controls>
                                <source src="{{asset("uploads/video/$video->video")}}" type="video/mp4">
                              Your browser does not support the video tag.
                          </video>
                          </td>
                          <td>{{$video->title}}</td>
                          <td>
                          {{-- //button edit and delete --}}
                            <a href="{{route('video.edit',$video->id)}}" ><button class="btn btn-warning" type="button" data-bs-original-title="" title=""><i class="fa fa-pencil"></i></button></a>
                            <a href="{{route('video.delete',$video->id)}}" ><button class="btn btn-danger" type="button" data-bs-original-title="" title=""><i class="fa fa-trash-o"></i></button></a>
                          </td>
                        </tr>

                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>  
@endsection