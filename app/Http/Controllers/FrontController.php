<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    function index(){
        $menus = Menu::where('menu_status',1)->get();
        return view('front.index',compact(['menus']));
    }
}
