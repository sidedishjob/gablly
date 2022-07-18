<?php

use App\Http\Controllers\PostController;
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

// Route::get('/post', function() {
// 	return view('posts.post');
// })->name('post');

Route::resource('posts', PostController::class, ['only' => ['index', 'show', 'create', 'store']]);
Route::get('posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('posts/update', [PostController::class, 'updateOrDelete'])->name('posts.update');

