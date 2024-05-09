<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

use App\Http\Controllers\AccountController;

use App\Http\Controllers\LoginController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/tasks',[TaskController::class,'index'])->name('tasks.index');
Route::post('/tasks',[TaskController::class,'store'])->name('tasks.store');


Route::get('/account/register',[AccountController::class, 'index'])->name('register.index');
Route::post('/account/register',[AccountController::class, 'store'])->name('register.store');

Route::get('/admin', [AccountController::class, 'admin'])->name('admin.index');
Route::delete('/admin/accounts/{id}', [AccountController::class, 'delete'])->name('admin.accounts.delete');
Route::get('/admin/accounts/{id}', [AccountController::class, 'getAssociatedTasks'])->name('admin.accounts.tasks');

//pag add ug route sa login index ngalan check index nimo sa register sa return
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');


