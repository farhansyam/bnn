@extends('layouts.backend')
@section('title_content') Child Menu List  @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/"><i data-feather="home"></i></a></li>
<li class="breadcrumb-item"><a href="/menu">Child Menu List</i></a></li>
@endsection
@Section('content')
<div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                  <a href="{{route('sub-menu.create')}}" ><button class="btn btn-primary" type="button" data-bs-original-title="" title="">Tambah Sub Menu/Kontent</button></a>
                  <br>
                  <br>
                    <h4>Daftar List Child Menu / Kontent</h4><span>Dalam tabel dibawah ini adalah daftar menu / kontent dari menu utama dari musium bnn</span>
                  </div>
                  <div class="table-responsive theme-scrollbar">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Status</th>
                          <th scope="col">Nama Menu	</th>
                          <th scope="col">Tipe Menu/Kontent</th>
                          <th scope="col">Icon (untuk kontent)</th>
                          <th scope="col">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($subMenu as $menu)
                          
                        <tr>
                          <th scope="row">1</th>
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
                          <td>{{$menu->icon}}</td>
                          <td>
                          {{-- //button edit and delete --}}
                            <a href="{{route('sub-menu.edit',$menu->id)}}" ><button class="btn btn-primary" type="button" data-bs-original-title="" title="">Edit</button></a>
                            <a href="{{route('sub-menu.delete',$menu->id)}}" ><button class="btn btn-danger" type="button" data-bs-original-title="" title="">Hapus</button></a>
                          </td>
                        </tr>

                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>  
@endsection