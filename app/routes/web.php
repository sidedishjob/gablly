<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

//ドメインでアクセスしてきた時用（http://gablly.com/）
Route::get('/', [App\Http\Controllers\PostController::class, 'index'])->name('top');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function() {
	return view('about');
})->name('about');

#TODOコントローラを通すかは要検討
Route::get('/contact', function() {
	return view('contacts.contact');
})->name('contact');

Route::resource('posts', PostController::class, ['only' => ['index', 'show', 'create', 'store']]);
Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('posts/update', [PostController::class, 'updateOrDelete'])->name('posts.update');

//プロフィール編集画面表示
Route::get('users/edit', [UserController::class, 'edit'])->name('users.edit');
//プロフィール更新処理orパスワード変更処理
Route::post('users/update', [UserController::class, 'updateOrChange'])->name('users.update');
