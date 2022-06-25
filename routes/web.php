<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\NewsletterController;


// all posts or filtered posts (filtered by category, seach, or author)
Route::get('/', [PostController::class, 'index'])->name('home');

// single post
Route::get('posts/{post:slug}', [PostController::class, 'show'])->middleware('visitor.count');
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

// mailchimp API setup
Route::post('newsletter', NewsletterController::class);

// register 
// note: middleware('guest') ensures only guests can see 'register' page 
Route::get('cadastro', [RegisterController::class, 'create'])->middleware('guest');

// store user input data into database 
Route::post('cadastro', [RegisterController::class, 'store'])->middleware('guest');
Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

// log user out
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');

// Admin 
Route::get('admin/painel', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts/{post}/editar', [AdminPostController::class, 'edit'])->middleware('admin');
Route::get('admin/posts/criar', [AdminPostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');


