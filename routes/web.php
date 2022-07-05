<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminUserController;

// all posts or filtered posts (filtered by seach, or author)
Route::get('/', [PostController::class, 'index'])->name('home');

// single post
Route::get('posts/{post:slug}', [PostController::class, 'show'])->middleware('visitor.count');
Route::post('posts/{post:slug}/comments', [PostCommentController::class, 'store']);

// About view
Route::get('sobre', [AboutController::class, 'show']);

// amar a post route 
Route::post('posts/{post:slug}/amar', [PostLikeController::class, 'like'])->name('like');

// mailchimp API setup
Route::post('newsletter', NewsletterController::class);

// REGISTER 
// note: middleware('guest') ensures only guests can see 'register' page 
Route::get('cadastro', [RegisterController::class, 'create'])->middleware('guest');
// store user input data into database 
Route::post('cadastro', [RegisterController::class, 'store'])->middleware('guest');

//LOGIN
Route::get('login', [SessionController::class, 'create'])->middleware('guest')->name('login');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');
// log user out
Route::post('logout', [SessionController::class, 'destroy'])->middleware('auth');
// user view profile
Route::get('perfil/{user:username}', [SessionController::class, 'show'])->middleware('auth');
// user edit profile
Route::get('perfil/{user:username}/editar', [SessionController::class, 'edit'])->middleware('auth');
Route::patch('perfil/{user:username}', [SessionController::class, 'update'])->middleware('auth');

// Admin 
Route::get('admin/painel', [AdminPostController::class, 'index'])->middleware('admin');
Route::get('admin/posts/{post}/editar', [AdminPostController::class, 'edit'])->middleware('admin');
Route::get('admin/posts/criar', [AdminPostController::class, 'create'])->middleware('admin');
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('admin');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('admin');
Route::get('admin/sobre/editar', [AboutController::class, 'edit'])->middleware('admin');
Route::patch('admin/sobre', [AboutController::class, 'update'])->middleware('admin');
Route::get('admin/painel/usuários', [AdminUserController::class, 'index'])->middleware('admin');
Route::delete('admin/usuários/{user}', [AdminUserController::class, 'destroy'])->middleware('admin');
Route::delete('admin/comentários/{comment}', [AdminCommentController::class, 'destroy'])->middleware('admin');
// easteregg
Route::view('matzá', 'easteregg.easteregg')->middleware('admin');


