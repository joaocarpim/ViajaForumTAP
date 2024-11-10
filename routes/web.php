<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;



Route::get('/', [AuthController::class, 'teste'])->name('teste');

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])->name('login');
Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    // User routes
    Route::get('/users', [UserController::class, 'listAllUsers'])->name('listAllUsers');
    Route::get('/users/{id}', [UserController::class, 'listUserById'])->name('listUserById');
    Route::put('/users/{id}/update', [UserController::class, 'updateUser'])->name('updateUser');
    Route::delete('/users/{id}/delete', [UserController::class, 'deleteUser'])->name('deleteUser');

    // Post routes
    Route::get('/posts', [PostController::class, 'listAllPosts'])->name('listAllPosts');
    Route::get('/posts/{id}', [PostController::class, 'listPostById'])->name('listPostById');
    Route::put('/posts/{id}/update', [PostController::class, 'updatePost'])->name('updatePost');
    Route::delete('/posts/{id}/delete', [PostController::class, 'deletePost'])->name('deletePost');
    Route::match(['get', 'post'], '/posts/create', [PostController::class, 'createPost'])->name('createPost');

    // Topic routes

Route::get('/topics', [TopicController::class, 'listAllTopics'])->name('topics.listAllTopics');

Route::get('/topics/create', [TopicController::class, 'createTopicForm'])->name('topics.create');

Route::post('/topics', [TopicController::class, 'storeTopic'])->name('storeTopic');

Route::get('/topics/{id}/edit', [TopicController::class, 'editTopicForm'])->name('topics.edit');

Route::put('/topics/{id}', [TopicController::class, 'updateTopic'])->name('topics.update');


Route::delete('/topics/{id}', [TopicController::class, 'deleteTopic'])->name('topics.delete');

Route::get('/topics/{id}', [TopicController::class, 'showTopic'])->name('listTopicById');

// Tag routes
Route::get('/tags/create', [TagController::class, 'createTag'])->name('createTag');
Route::get('/tags', [TagController::class, 'listAllTags'])->name('listAllTags');
Route::get('/tags/{id}', [TagController::class, 'listTagById'])->name('listTagById');
Route::put('/tags/{id}/update', [TagController::class, 'updateTag'])->name('updateTag');
Route::delete('/tags/{id}/delete', [TagController::class, 'deleteTag'])->name('deleteTag');
Route::post('/tags', [TagController::class, 'storeTag'])->name('storeTag');

    // Category routes
    Route::get('/categories', [CategoryController::class, 'listAllCategories'])->name('listAllCategories');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('createCategory');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{idCategory}', [CategoryController::class, 'listCategoryById'])->name('listCategoryById');
    Route::get('/categories/{idCategory}/edit', [CategoryController::class, 'edit'])->name('editCategory');
    Route::put('/categories/{idCategory}', [CategoryController::class, 'updateCategory'])->name('updateCategory');
    Route::delete('/categories/{idCategory}', [CategoryController::class, 'deleteCategory'])->name('deleteCategory');
    
    

Route::post('/topics/{topicId}/comments', [CommentController::class, 'store'])->name('createComment');

});
