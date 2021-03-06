<?php

use Illuminate\Support\Facades\Route;

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

// ユーザー
Route::namespace('User')->prefix('user')->name('user.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:user')->group(function () {

        // TOPページ
        Route::get('home', 'HomeController@index')->name('index');

        //登録処理
        Route::post('attendanceRegister', 'HomeController@register')->name('attendanceRegister');
    });
});

// 管理者
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {

    // ログイン認証関連
    Auth::routes([
        'register' => true,
        'reset'    => false,
        'verify'   => false
    ]);

    // ログイン認証後
    Route::middleware('auth:admin')->group(function () {

        // TOPページ
        Route::get('home', 'HomeController@index')->name('index');

        // 詳細ページ
        Route::get('attendance/{id}', 'HomeController@detail')->name('detail')->where('id', '[0-9]+');

        // csv出力処理
        Route::get('attendance/putCsv', 'HomeController@putCsv')->name('putCsv');
    });

});
