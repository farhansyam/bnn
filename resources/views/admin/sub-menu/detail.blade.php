@extends('layouts.backend')
@section('title_content') Detail Isi  @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('menu.detail',$parrent->id)}}">{{$parrent->menu_name}}</i></a></li>
<li class="breadcrumb-item"><a href="{{route('sub-menu.detail',$child->id)}}">{{$child->name}}</i></a></li>
@endsection
@Section('content')
<div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                  <a href="{{route('content.create')}}" ><button class="btn btn-primary" type="button" data-bs-original-title="" title="">Tambah Isi</button></a>
                  <br>
                  <br>
                    <h4>Daftar Isi dari {{$child->name}}</h4><span>Dalam tabel dibawah ini adalah daftar menu / kontent dari menu utama dari musium bnn</span>
                  </div>
                  <div class="table-responsive theme-scrollbar">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Status</th>
                          <th scope="col">Nama Menu	</th>
                          <th scope="col">Tipe Menu/Kontent</th>
                          <th scope="col">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php
                        $no = 1;
                      @endphp
                      @foreach ($content as $konten)
                          
                        <tr>
                          <th scope="row">{{$no++}}</th>
                          <td scope="row"> 
                          @if ($konten->status == 0)
                              <span class="font-danger">Non Active</span>
                          @else
                          <span class="font-success">Active</span>

                          @endif
                          
                          </td>
                          <td>{{$konten->title}}</td>
                          <td>
                          @if ($konten->type == 1)
                              <span class="font-warning">Sub Menu</span>
                          @elseif($konten->type == 2)
                          <span class="font-success">Video</span>
                          @else
                          <span class="font-success">Galleri</span>
                          @endif
                          </td>
                          <td>
                          @if ($konten->type == 1)
                            <a href="{{route('sub-menu.detail',$konten->id)}}" ><button class="btn btn-success" type="button" data-bs-original-title="" title=""><i class="fa fa-folder"></i></button></a>
                            <a href="{{route('content.edit',$konten->id)}}" ><button class="btn btn-warning" type="button" data-bs-original-title="" title=""><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('content.delete',$konten->id)}}" ><button class="btn btn-danger" type="button" data-bs-original-title="" title=""><i class="fa fa-trash-o"></i></button></a>
                          @elseif($konten->type == 2)
                            <a href="{{route('video.konten',$konten->id)}}" ><button class="btn btn-success" type="button" data-bs-original-title="" title=""><i class="fa fa-folder"></i></button></a>
                            <a href="{{route('content.edit',$konten->id)}}" ><button class="btn btn-warning" type="button" data-bs-original-title="" title=""><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('video.delete',$konten->id)}}" ><button class="btn btn-danger" type="button" data-bs-original-title="" title=""><i class="fa fa-trash-o"></i></button></a>
                          @else
                            <a href="{{route('galleri.konten',$konten->id)}}" ><button class="btn btn-success" type="button" data-bs-original-title="" title=""><i class="fa fa-folder"></i></button></a>
                            <a href="{{route('content.edit',$konten->id)}}" ><button class="btn btn-warning" type="button" data-bs-original-title="" title=""><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('content.delete',$konten->id)}}" ><button class="btn btn-danger" type="button" data-bs-original-title="" title=""><i class="fa fa-trash-o"></i></button></a>
                          @endif
                          </td>
                        </tr>

                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>  
@endsection