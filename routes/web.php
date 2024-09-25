<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
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
Route::get('/', [AuthController::class, 'teste'])->name('teste');

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');

Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/users', [UserController::class, 'listAllUsers'])->name('listAllUsers');

    Route::get('/users/{id}', [UserController::class, 'listUserById'])->name('listUserById');

    Route::put('/users/{id}/update', [UserController::class, 'updateUser'])->name('updateUser');

    Route::delete('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');


    Route::get('/Posts', [PostController::class, 'listAllPosts'])->name('listAllPosts');

    Route::get('/Posts/{id}', [PostController::class, 'listPostById'])->name('listPostById');

    Route::put('/Posts/{id}/update', [PostController::class, 'updatePost'])->name('updatePost');

    Route::delete('/Posts/{id}/delete', [PostController::class, 'deletePost'])->name('deletePost');

    Route::match(['get', 'post'], '/createPost', [PostController::class, 'createPost'])->name('createPost');


    Route::get('/Topics', [TopicController::class, 'listAllTopics'])->name('listAllTopics');

    Route::get('/Topics/{id}', [TopicController::class, 'listTopicById'])->name('listTopicById');

    Route::put('/Topics/{id}/update', [TopicController::class, 'updateTopic'])->name('updateTopic');

    Route::delete('/Topics/{id}/delete', [TopicController::class, 'deleteTopic'])->name('deleteTopic');

    Route::match(['get', 'post'], '/createTopic', [TopicController::class, 'createTopic'])->name('createTopic');


    Route::get('/Tags', [TagController::class, 'listAllTags'])->name('listAllTags');

    Route::get('/Tags/{id}', [TagController::class, 'listTagById'])->name('listTagById');

    Route::put('/Tags/{id}/update', [TagController::class, 'updateTag'])->name('updateTag');

    Route::delete('/Tags/{id}/delete', [TagController::class, 'deleteTag'])->name('deleteTag');

    Route::match(['get', 'post'], '/createTag', [TagController::class, 'createTag'])->name('createTag');


    Route::get('/categories', [CategoryController::class, 'listAllCategories'])->name('listAllCategories');
    
    Route::get('/categories/create', [CategoryController::class, 'register'])->name('createCategory');

    Route::post('/categories', [CategoryController::class, 'register']);
    
    Route::get('/categories/{id}', [CategoryController::class, 'listCategoryById'])->name('listCategoryById');
    
    Route::post('/categories/{id}/update', [CategoryController::class, 'updateCategory'])->name('updateCategory');
    
    Route::delete('/categories/{id}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
    

});
