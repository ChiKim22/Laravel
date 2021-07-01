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

Route::get('/posts/create', [PostsController::class, 'create']);
// Route::get('/posts/create', 'PostsController@create'); 도 가능하다.

Route::post('/posts/store', [PostsController::class, 'store']);

Route::get('/posts/index', [PostsController::class, 'index']);