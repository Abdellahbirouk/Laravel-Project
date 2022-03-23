<?php
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('auth/login');
});

Route::get('/home', function () {
    return view('posts.index');
});


Route::resource('/posts', 'PostController');

Route::resource('/comments', 'CommentController');

Auth::routes();

