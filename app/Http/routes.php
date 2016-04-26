<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


// 欢迎页面
Route::get('/', 'Home\IndexController@getIndex');
// 认证路由...
Route::controller('auth', 'Auth\AuthController');


// 用户工作界面

// 后台管理
Route::group(['prefix'=>'admin'], function () {
    Route::controller('/', 'Admin\IndexController');
});
