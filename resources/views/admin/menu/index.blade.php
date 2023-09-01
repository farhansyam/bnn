@extends('layouts.backend')
@section('title_content') Main Menu List  @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/"><i data-feather="home"></i></a></li>
<li class="breadcrumb-item"><a href="/menu">Main Menu List</i></a></li>
@endsection
@Section('content')
<div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                  <a href="{{route('menu.create')}}" ><button class="btn btn-primary" type="button" data-bs-original-title="" title="">Tambah Menu</button></a>
                  <br>
                  <br>
                    <h4>Daftar List Main Menu Musium</h4><span>Dalam tabel dibawah ini adalah daftar menu utama dari musium bnn</span>
                  </div>
                  <div class="table-responsive theme-scrollbar">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Status</th>
                          <th scope="col">Nama Menu	</th>
                          {{-- <th scope="col">Icon</th> --}}
                          <th scope="col">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @php
                          $no = 1;
                      @endphp
                      @foreach ($menus as $menu)
                          
                        <tr>
                          <th scope="row">{{$no++}}</th>
                          <td scope="row"> 
                          @if ($menu->menu_status == 0)
                              <span class="font-danger">Non Active</span>
                          @else
                          <span class="font-success">Active</span>

                          @endif
                          
                          </td>
                          <td>{{$menu->menu_name}}</td>
                          {{-- <td>{{$menu->menu_icon}}</td> --}}
                          <td>
                          {{-- //button edit and delete --}}
                            <a href="{{route('menu.edit',$menu->id)}}" ><button class="btn btn-primary" type="button" data-bs-original-title="" title="">Edit</button></a>
                            <a href="{{route('menu.delete',$menu->id)}}" ><button class="btn btn-danger" type="button" data-bs-original-title="" title="">Hapus</button></a>
                          </td>
                        </tr>

                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>  
@endsection