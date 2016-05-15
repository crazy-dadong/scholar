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

// 警告： 顺序不能随便更改

// 认证路由...
Route::controller('auth', 'Auth\AuthController');


// 后台管理
Route::group(['prefix'=>'admin'], function () {
    Route::controller('/dashboard', 'Admin\Dashboard\IndexController');
    Route::controller('/user', 'Admin\User\IndexController');
});

// 用户管理
Route::group(['prefix'=>'user'], function () {
    Route::controller('/dashboard', 'User\Dashboard\DashboardController');
    Route::controller('/task/model', 'User\Task\ModelController');
    Route::controller('/task/task', 'User\Task\TaskController');
    Route::controller('/task/work', 'User\Task\WorkController');
});



// 欢迎界面
Route::group([], function () {
    Route::get('/', 'Welcome\IndexController@getIndex');
});