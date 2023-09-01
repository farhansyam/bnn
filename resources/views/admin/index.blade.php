@extends('layouts.backend')
@section('title_content') Dashboard  @endsection
@section('breadcrumb')
<li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
@endsection
@Section('content')
<div class="card custom-board">
    <div class="card-header pb-0">
        <div class="d-flex">
            <div class="flex-grow-1">
                <h4>Welcome {{auth()->user()->name}}</h4>
            </div>
        </div>
    </div>
    <div class="card-body pb-0">
        <div id="demo2"></div>
    </div>
</div>    
@endsection