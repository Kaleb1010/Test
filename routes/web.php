<?php

use App\Http\Controllers\TodoController;
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

Route::get('todo',[\App\Http\Controllers\TodoController::class,'index']);
Route::post('todo_create',[\App\Http\Controllers\TodoController::class,'create'])->name('create');

Route::get('/completed/{id}/{task_status}',[\App\Http\Controllers\TodoController::class, 'complete_task'])->name('complete');


Route::post('/task_update',[TodoController::class, 'edit_todo'])->name('edit_todo');

Route::get('/admin_delete/{id}',[TodoController::class, 'delete_record'])->name('delete_data');

Route::get('/login',[\App\Http\Controllers\LoginController::class, 'index']);
Route::post('/check',[\App\Http\Controllers\LoginController::class, 'check'])->name('check');
Route::get('/logout',[\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


Route::get('/register',[\App\Http\Controllers\LoginController::class, 'reg']);
Route::post('/registering',[\App\Http\Controllers\LoginController::class, 'Register'])->name('re_create');


