<?php


use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){
    return view('home');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [UserController::class, "loginform"])->name('loginform');
    Route::get('/register', [UserController::class, "register"])->name("user.register");
    Route::post('/register', [UserController::class, 'makeuser'])->name('makeuser');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/tasks', [TasksController::class, 'tasks'])->name('user.tasks');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/task/create', [TasksController::class, 'createform'])->name('task.form');
    Route::post('/create/task', [TasksController::class, 'createtask'])->name('task.create');
    Route::post('/edittask', [TasksController::class, 'edittaskform'])->name('edittask');
    Route::post('/makeedit', [TasksController::class, 'makeedit'])->name('makeedit');
    Route::post('/deletetask', [TasksController::class, 'deletetask'])->name('deletetask');
    Route::post('/search', [TasksController::class, 'searchtask'])->name('searchtask');
});

