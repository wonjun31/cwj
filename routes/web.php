<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\FirstController;



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

//Route::get('/test123','App\Http\Controllers\BoardController@show');

//경로먹음
Route::get('/test',[Controller::class, 'index']);

//Route::get('/test123',[MakeController::class, 'index']);

Route::get('/test123',[FirstController::class, 'index']);


Route::middleware(['auth:sanctum', 'verified'])->get('/boardView/{board_no}', function ( $board_no ) {

    $boardView = DB::table('board')->where("board_no" ,$board_no)->first();

    //조회수 업데이트
    DB::table('board')->where('board_no', $board_no)->update(['views' => $boardView->views + 1 ]);

    $boardView = DB::table('board')->where("board_no" ,$board_no)->first();

    return view('boardView', ['boardView' => $boardView]);
})->name('boardView');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/tab1', function () {
    return view('tab1');
})->name('tab1');

Route::middleware(['auth:sanctum', 'verified'])->get('/tab2', function () {

    $board = DB::table('board')->orderByRaw("board_no desc")->paginate(10);

    return view('tab2', ['board' => $board]);
})->name('tab2');


Route::middleware(['auth:sanctum', 'verified'])->get('/boardWrite', function () {
    return view('boardWrite');
})->name('boardWrite');


Route::post('/boardCreate', [BoardController::class, 'create'] )
->name('boardCreate');



Route::middleware(['auth:sanctum', 'verified'])->get('/boardUpdateView', function () {
    $board_no =$_GET['board_no'];

    $boardView = DB::table('board')->where("board_no" ,$board_no)->first();

    return view('boardUpdateView', ['boardView' => $boardView]);
})->name('boardUpdateView');


Route::post('/boardUpdate', [BoardController::class, 'update'] )
->name('boardUpdate');




