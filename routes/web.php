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

Route::get('/', function () {
    return view('index');
});

Route::get('/demo','Democontroller@index');
//file này là router điều hướng domain của web ha. toàn bộ router nếu muốn hiểu thì phải khai báo ở đây
