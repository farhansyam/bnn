@extends('layouts.backend')
@section('title_content') Create Menu  @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href="/"><i data-feather="home"></i></a></li>
<li class="breadcrumb-item"><a href="/menu">Main Menu List</i></a></li>
<li class="breadcrumb-item"><a href="/menu/edit/{{$menu->id}}">Edit</i></a></li>
@endsection
@Section('content')
<div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0">
                    <h4>Form Edit</h4>
                  </div>
                  <form class="form theme-form" method="post" action="{{route('menu.update',$menu->id)}}">
                    <div class="card-body">
                    @csrf
                        <div class="col">
                          <div class="mb-3">
                            <label class="form-label" for="nama_menu">Nama Menu</label>
                            <input name="menu_name" value="{{$menu->menu_name}}" class="form-control" id="nama_menu" type="text" placeholder="Menu baru" data-bs-original-title="" title="">
                          </div>
                        </div>
                        <div class="form-check checkbox checkbox-solid-info">
                            <input class="form-check-input" value="1" id="solid6" type="checkbox" name="menu_status" 
                              @if ($menu->menu_status == 1)
                                  checked
                              @endif
                            >
                            <label class="form-check-label" for="solid6">Status Aktive</label>
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