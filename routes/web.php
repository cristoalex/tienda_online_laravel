<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\RouteGroup;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');//dar el login de pantalla principal
});

/*
Route::get('/producto', function () {
    return view('producto.index');
});

Route::get('/producto/create',[ProductosController::class,'create']);
*/

Route::resource('producto', ProductosController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function(){
    return redirect('/home');
});


//Route::resource('producto', ProductosController::class)->middleware('auth');


Auth::routes([/*'register'=>false,*/'reset'=>false]);

// se puede cambiar la dirrecion de clase index a "la que se me de la gana :)"


//Route::get('/home', [ProductosController::class, 'index'])->name('home');

//Route::group(['middleware' => 'auth'], function(){
//    Route::get('/', [ProductosController::class, 'index'])->name('home');
//});

