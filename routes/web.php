<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ModeratorController;
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
  

    Route::get('/posts/create', [PostController::class, 'createPost'])->name('createPost');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts', [PostController::class, 'listAllPosts'])->name('listAllPosts');

    // Comment routes within Topic
    Route::prefix('topics/{topicId}/comments')->group(function () {
        Route::get('/', [CommentController::class, 'index'])->name('comments.index');
        Route::get('/{id}', [CommentController::class, 'show'])->name('comments.show');
        Route::get('/create', [CommentController::class, 'create'])->name('comments.create');
        Route::post('/', [CommentController::class, 'store'])->name('comments.store');
        Route::get('/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
        Route::put('/{id}', [CommentController::class, 'update'])->name('comments.update');
        Route::delete('/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    });

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

    // admin routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    });

    // moderator routes
    Route::middleware(['auth', 'moderator'])->group(function () {
        Route::get('/moderator/dashboard', [ModeratorController::class, 'index'])->name('moderator.dashboard');
    });
    Route::middleware(['auth', 'moderator'])->post('/usuarios/{user}/suspender', [UserController::class, 'toggleSuspension'])->name('user.toggleSuspension');

    // suspension user
    Route::middleware(['auth', 'chack.suspension'])->group(function () {
        Route::post('/categories/{category}/suspension', [CategoryController::class, 'suspend'])->name('categories.suspend');
        Route::post('/tags/{tag}/suspension', [TagController::class, 'suspend'])->name('tags.suspend');
        Route::post('/topics/{topic}/suspension', [TopicController::class, 'suspend'])->name('topics.suspend');
        Route::post('/posts/{post}/suspension', [PostController::class, 'suspend'])->name('posts.suspend');
        Route::post('/users/{user}/suspension', [UserController::class, 'suspend'])->name('users.suspend');
    });

    // Config Admin
    Route::get('/config-user', function () {
        $admin = User::find(1);
        if (!$admin) {
            $admin = new User();
            $admin->id = 1;
        }

        $admin->name = 'admin suporte';
        $admin->email = 'adminsuporte@gmail.com';
        $admin->password = Hash::make('adminsuporte123');
        $admin->role = 'admin';
        $admin->save();

        // Config Moderador
        $moderator = User::find(2);
        if (!$moderator) {
            $moderator = new User();
            $moderator->id = 2;
        }

        $moderator->name = 'moderador suporte';
        $moderator->email = 'moderadorsuporte@gmail.com';
        $moderator->password = Hash::make('moderadorsuporte123');
        $moderator->role = 'moderator';
        $moderator->save();

        return "Usuários Admin e Moderador configurados com sucesso!";
    });
});
