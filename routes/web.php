<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\fruitController;
use App\Http\Controllers\cardController;

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
Route::get('/fruit', function () {
    return view('listendb');
});

Route::post('/store', [fruitController::class, 'store']);

Route::post('/card', [cardController::class, 'store']);



?>
