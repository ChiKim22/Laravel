<?php

use App\Http\Controllers\PostsController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

// Route::get('/test4', [TestController::class, 'index']);

Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create')/*->middleware(['auth'])*/;
// Route::get('/posts/create', 'PostsController@create'); 도 가능하다.
Route::post('/posts/store', [PostsController::class, 'store'])/*->middleware(['auth'])*/;
Route::get('/posts/index', [PostsController::class, 'index'])->name('posts.index');

Route::get('/posts/myPost', [PostsController::class, 'myPost'])->name('posts.myPost');
//상세보기
Route::get('/posts/show/{id}', [PostsController::class, 'show'])->name('posts.show');
//edit
Route::get('/posts/{post}', [PostsController::class, 'edit'])->name('post.edit');
Route::put('/posts/{id}', [PostsController::class, 'update'])->name('post.update');
//delete
Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('post.delete');
