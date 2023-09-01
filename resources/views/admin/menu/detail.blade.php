@extends('layouts.backend')
@section('title_content') Detail Isi  @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('menu.detail',$menu->id)}}">{{$menu->menu_name}}</i></a></li>
@endsection
@Section('content')
<div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                  <a href="{{route('sub-menu.create')}}" ><button class="btn btn-primary" type="button" data-bs-original-title="" title="">Tambah Isi</button></a>
                  <br>
                  <br>
                    <h4>Daftar Isi dari {{$menu->menu_name}}</h4><span>Dalam tabel dibawah ini adalah daftar menu / kontent dari menu utama dari musium bnn</span>
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
                      @foreach ($subMenu as $menu)
                          
                        <tr>
                          <th scope="row">{{$no++}}</th>
                          <td scope="row"> 
                          @if ($menu->status == 0)
                              <span class="font-danger">Non Active</span>
                          @else
                          <span class="font-success">Active</span>

                          @endif
                          
                          </td>
                          <td>{{$menu->name}}</td>
                          <td>
                          @if ($menu->type == 1)
                              <span class="font-warning">Sub Menu</span>
                          @elseif($menu->type == 2)
                          <span class="font-success">Video</span>
                          @else
                          <span class="font-success">Galleri</span>
                          @endif
                          </td>
                          <td>
                          {{-- //button edit and delete --}}
                          @if ($menu->type == 1)
                            <a href="{{route('sub-menu.detail',$menu->id)}}" ><button class="btn btn-success" type="button" data-bs-original-title="" title=""><i class="fa fa-folder"></i></button></a>
                            <a href="{{route('sub-menu.edit',$menu->id)}}" ><button class="btn btn-warning" type="button" data-bs-original-title="" title=""><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('sub-menu.delete',$menu->id)}}" ><button class="btn btn-danger" type="button" data-bs-original-title="" title=""><i class="fa fa-trash-o"></i></button></a>
                          @elseif($menu->type == 2)
                            <a href="{{route('sub-menu.detail',$menu->id)}}" ><button class="btn btn-success" type="button" data-bs-original-title="" title=""><i class="fa fa-folder"></i></button></a>
                            <a href="{{route('sub-menu.edit',$menu->id)}}" ><button class="btn btn-warning" type="button" data-bs-original-title="" title=""><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('sub-menu.delete',$menu->id)}}" ><button class="btn btn-danger" type="button" data-bs-original-title="" title=""><i class="fa fa-trash-o"></i></button></a>
                          @else
                            <a href="{{route('galleri.index',$menu->id)}}" ><button class="btn btn-success" type="button" data-bs-original-title="" title=""><i class="fa fa-folder"></i></button></a>
                            <a href="{{route('sub-menu.edit',$menu->id)}}" ><button class="btn btn-warning" type="button" data-bs-original-title="" title=""><i class="fa fa-edit"></i></button></a>
                            <a href="{{route('sub-menu.delete',$menu->id)}}" ><button class="btn btn-danger" type="button" data-bs-original-title="" title=""><i class="fa fa-trash-o"></i></button></a>
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