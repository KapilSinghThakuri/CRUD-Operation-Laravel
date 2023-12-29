<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productcontroller;

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
    return view('welcome');
});

//PRODUCTS MANAGEMENT CRUD
Route::get('/home',[productcontroller::class,'index']);

Route::get('products/create',[productcontroller::class,'create']);

Route::post('products/store',[productcontroller::class,'store']);

Route::get('products/{id}/edit',[productcontroller::class,'edit']);

Route::put('products/{id}/update',[productcontroller::class,'update']); //(put or patch) mehtod for update data

Route::get('products/{id}/delete',[productcontroller::class,'destroy']);

Route::get('products/{id}/show',[productcontroller::class,'show']);