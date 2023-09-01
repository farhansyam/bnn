<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\SubMenuController;

route::get('/', [FrontController::class, 'index'])->name('front.index'); 


Auth::routes();






//route with prefix admin and middleware auth
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class,'index'])->name('admin.index');
    route::get('/menu', [MenuController::class,'index'])->name('menu'); 
    route::get('/menu/create', [MenuController::class,'create'])->name('menu.create'); 
    route::get('/menu/edit/{id}', [MenuController::class,'edit'])->name('menu.edit'); 
    route::post('/menu/update/{id}', [MenuController::class,'update'])->name('menu.update'); 
    route::get('/menu/delete/{id}', [MenuController::class,'delete'])->name('menu.delete'); 
    route::post('/menu/store', [MenuController::class,'store'])->name('menu.store'); 
    route::get('/menu/detail/{id}', [MenuController::class,'detail'])->name('menu.detail'); 

    route::get('/sub-menu', [SubMenuController::class,'index'])->name('sub-menu');     
    route::get('/sub-menu/create', [SubMenuController::class,'create'])->name('sub-menu.create'); 
    route::get('/sub-menu/edit/{id}', [SubMenuController::class,'edit'])->name('sub-menu.edit'); 
    route::post('/sub-menu/update/{id}', [SubMenuController::class,'update'])->name('sub-menu.update'); 
    route::get('/sub-menu/delete/{id}', [SubMenuController::class,'delete'])->name('sub-menu.delete'); 
    route::post('/sub-menu/store', [SubMenuController::class,'store'])->name('sub-menu.store');
    route::get('/sub-menu/detail/{id}', [SubMenuController::class, 'detail'])->name('sub-menu.detail'); 

    route::get('/content', [ContentController::class,'index'])->name('content');     
    route::get('/content/create', [ContentController::class,'create'])->name('content.create'); 
    route::get('/content/edit/{id}', [ContentController::class,'edit'])->name('content.edit'); 
    route::post('/content/update/{id}', [ContentController::class,'update'])->name('content.update'); 
    route::get('/content/delete/{id}', [ContentController::class,'delete'])->name('content.delete'); 
    route::post('/content/store', [ContentController::class,'store'])->name('content.store');
    route::get('/content/detail/{id}', [ContentController::class, 'detail'])->name('content.detail'); 


    route::get('/galleri/index/{id}', [GalleryController::class,'index'])->name('galleri.index'); 
    route::get('/galleri/konten/{id}', [GalleryController::class,'GalleriKonten'])->name('galleri.konten'); 
    route::get('/galleri/create', [GalleryController::class,'create'])->name('galleri.create'); 
    route::post('/galleri/store', [GalleryController::class,'store'])->name('galleri.store'); 
    route::post('/galleri/update/{id}', [GalleryController::class,'update'])->name('galleri.update'); 
    route::get('/galleri/edit/{id}', [GalleryController::class,'edit'])->name('galleri.edit'); 
    route::get('/galleri/delete/{id}', [GalleryController::class,'destroy'])->name('galleri.delete'); 
   
   
    route::get('/video/index/{id}', [VideoController::class,'index'])->name('video.index'); 
    route::get('/video/konten/{id}', [VideoController::class,'VideoKonten'])->name('video.konten'); 
    route::get('/video/create', [VideoController::class,'create'])->name('video.create'); 
    route::post('/video/store', [VideoController::class,'store'])->name('video.store'); 
    route::post('/video/update/{id}', [VideoController::class,'update'])->name('video.update'); 
    route::get('/video/edit/{id}', [VideoController::class,'edit'])->name('video.edit');
    route::get('/video/detail/{id}', [VideoController::class, 'detail'])->name('video.detail'); 
    route::get('/video/delete/{id}', [VideoController::class,'destroy'])->name('video.delete'); 

});