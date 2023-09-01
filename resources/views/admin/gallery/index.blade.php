@extends('layouts.backend')
@section('title_content') List Galleri  @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('menu.detail',$parrent->id)}}">{{$parrent->menu_name}}</i></a></li>
<li class="breadcrumb-item"><a href="{{route('galleri.index',$child->id)}}">{{$child->name}}</i></a></li>
@if (session()->has('id_konten'))
<li class="breadcrumb-item"><a href="{{route('galleri.konten',$konten->id)}}">{{$konten->title}}</i></a></li>
@endif
@endsection
@Section('content')
<div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                  <a href="{{route('galleri.create')}}" ><button class="btn btn-primary" type="button" data-bs-original-title="" title="">Tambah Gambar</button></a>
                  <br>
                  <br>
                  @if(session()->has('id_konten'))
                    <h4>Daftar List Isi {{$konten->title}}</h4><span>Dalam tabel dibawah ini adalah daftar list foto/gambar</span>
                  @else
                    <h4>Daftar List Isi {{$child->name}}</h4><span>Dalam tabel dibawah ini adalah daftar list foto/gambar</span>
                  @endif
                  </div>
                  <div class="table-responsive theme-scrollbar">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Foto</th>
                          <th scope="col">Judul</th>
                          <th scope="col">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($gallery as $galleri)
                          
                        <tr>
                          <th scope="row">{{$no++}}</th>
                          <td scope="row"><img height="100" src="{{asset('images/gallery/'.$galleri->image)}}"></td>
                          <td>{{$galleri->title}}</td>
                          <td>
                          {{-- //button edit and delete --}}
                            <a href="{{route('galleri.edit',$galleri->id)}}" ><button class="btn btn-warning" type="button" data-bs-original-title="" title=""><i class="fa fa-pencil"></i></button></a>
                            <a href="{{route('galleri.delete',$galleri->id)}}" ><button class="btn btn-danger" type="button" data-bs-original-title="" title=""><i class="fa fa-trash-o"></i></button></a>
                          </td>
                        </tr>

                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>  
@endsection