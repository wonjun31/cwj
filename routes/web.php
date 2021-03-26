<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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
/*
Route::get('/test123', function () {
    return view('test123');
});
구 방법
Route::get('/test123', 'Controller@show');
*/
//새로운 방법
//Route::get('/test123','App\Http\Controllers\Controller@show');

//경로먹음
Route::get('/test',[Controller::class, 'index']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/tab1', function () {
    return view('tab1');
})->name('tab1');

Route::middleware(['auth:sanctum', 'verified'])->get('/tab2', function () {
    return view('tab2');
})->name('tab2');

