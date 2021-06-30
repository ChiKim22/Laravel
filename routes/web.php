<?php

use App\Http\Controllers\TestController;
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


Route::get('/test', function() {
    return 'Welcome!!!!';
});

Route::get('/test2', function() {
    return view('test.index'); //.과 '/' 는 같은 구분자
});

Route::get('/test3', function() {
    // 비지니스 로직 처리
    $name = '홍길동';
    $age = 20;
    // return view('test.show', ['name'=>$name, 'age'=>10]);
    return view('test.show', compact('name', 'age')); //compact 하게 쓰지만 대신 변수 선언 필요.
});

Route::get('/test4', [TestController::class, 'index']);

Route::get('/posts/create', [PostsController::class, 'create']);
// Route::get('/posts/create', 'PostsController@create'); 도 가능하다.
