<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::get('/', [TodoController::class, 'index'])
    ->name('todos.index')
    ->where('post', '[0-9]+');

Route::post('/todos/create', [TodoController::class, 'create'])
    ->name('todos.create');

Route::post('/todos/{post}/update', [TodoController::class,'update'])
    ->name('todos.update');

Route::post('/todos/{post}/delete',[TodoController::class,'destroy'])
    ->name('todos.destroy');

