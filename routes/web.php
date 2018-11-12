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

// Laravelのホーム画面
//Route::get('/', function () {
//    return view('welcome');   
//});

// ログイン画面
// 名前付きルート（ルート名：login）
// LoginControllerの中で、 use AuthenticatesUsers;　がある
// この中に、showLoginFormメソッドがある
// 名前付きルートに、loginを追加
Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

/*Laravel のAuth機能
 * 実はこのメソッドの内部で認証系に必要なルーティング定義を一通り追加してくれる
 * 最終的に vendor/laravel/framework/src/Illuminate/Routing/Router.php のauthメソッドが呼ばれる
 */
Auth::routes();


// 対局準備へ
Route::resource('taikyoku', 'Omo\TaikyokuController');


// 戦歴へ
Route::get('/rireki', 'Auth\LoginController@showLoginForm')->name('rireki');


// home
// 名前付きルート（ルート名：home）
Route::get('/home', 'HomeController@index')->name('home');

//★同じ get /home だと、後勝ちになる：こっちが動く（先勝ちじゃないの？）
//Route::get('/home', function() {
//    return 'Hello, World! This is Home!!!';
//});

