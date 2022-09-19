<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
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

Auth::routes(['verify' => true]);

//ドメインでアクセスしてきた時用（http://gablly.art/）
Route::get('/', [PostController::class, 'index'])->middleware('verified')->name('top');

//説明画面表示
Route::get('/about', function() {
	return view('about');
})->name('about');

//デモ画面表示
Route::get('/demo', function() {
	return view('demo');
})->name('demo');

//投稿（一覧、作成、更新）
Route::resource('posts', PostController::class, ['only' => ['index', 'create', 'store']])->middleware('verified');
Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('posts/update', [PostController::class, 'updateOrDelete'])->name('posts.update');

//プロフィール編集画面表示
Route::get('users/edit', [UserController::class, 'edit'])->name('users.edit');
//プロフィール更新処理orパスワード変更処理orユーザー削除
Route::post('users/update', [UserController::class, 'updateOrChangeOrDelete'])->name('users.update');

//お問い合わせ画面表示
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
//お問い合わせメール送信
Route::post('/contact/thanks', [ContactController::class, 'send'])->name('contact.send');

//公開日前（comming soon表示）
Route::get('/before', function() {
	return view('before');
})->name('before');