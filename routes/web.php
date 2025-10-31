<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index', [App\Http\Controllers\PostsController::class, 'index']);

Route::get('/test', [App\Http\Controllers\PostsController::class, 'test']);

Route::get('/post/create-form', [App\Http\Controllers\PostsController::class, 'createForm']);

Route::post('/post/create', [App\Http\Controllers\PostsController::class, 'create']);

Route::get('post/{id}/update-form', [App\Http\Controllers\PostsController::class, 'updateForm']);

Route::put('post/update', [App\Http\Controllers\PostsController::class, 'update']);

Route::delete('/post/delete', [App\Http\Controllers\PostsController::class, 'delete']);

Route::get('/search', [App\Http\Controllers\UsersController::class, 'search']);

Route::post('/result', [App\Http\Controllers\UsersController::class, 'result']);

Route::get('/users/search', [App\Http\Controllers\UsersController::class, 'search'])->name('users.search');

Route::get('/users/followers', [App\Http\Controllers\UsersController::class, 'followers'])->name('users.followers');

Route::get('/users/followings', [App\Http\Controllers\UsersController::class, 'followings'])->name('users.followings');

Route::post('/follow/create', [App\Http\Controllers\FollowsController::class, 'follow']);

Route::delete('/follow/delete', [App\Http\Controllers\FollowsController::class, 'delete']);

Route::get('follow-list', [App\Http\Controllers\FollowsController::class, 'followList']);
Route::get('follower-list', [App\Http\Controllers\FollowsController::class, 'followerList']);

Route::get('profile', [App\Http\Controllers\UsersController::class, 'profile']);

Route::get('profile/edit', [App\Http\Controllers\UsersController::class, 'edit']);

Route::put('profile/update', [App\Http\Controllers\UsersController::class, 'update']);

Route::get('/edit', [App\Http\Controllers\UsersController::class, 'edit']);

Route::get('other-profile/{id}', [App\Http\Controllers\UsersController::class, 'otherProfile']);
