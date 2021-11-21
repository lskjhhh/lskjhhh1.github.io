<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('add','TestControll@add');
Route::get('query','TestControll@query');
Route::get('queryDe/{id}','TestControll@queryDe');
Route::post('login/register','TestControll@register');
Route::post('login','TestControll@login');
Route::post('rel','TestControll@rel');
Route::post('comment','TestControll@com');
Route::get("commData/{res}","TestControll@commData");
