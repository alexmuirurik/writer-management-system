<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/', App\Http\Controllers\HomeController::class);

    Route::resource('project', App\Http\Controllers\ProjectController::class);


    Route::get('task/pending', [App\Http\Controllers\TaskController::class, 'index'])->name('task.pending');

    Route::get('task/complete', [App\Http\Controllers\TaskController::class, 'index'])->name('task.complete');

    Route::resource('task', App\Http\Controllers\TaskController::class);

    Route::resource('post', App\Http\Controllers\PostController::class);

    Route::resource('page', App\Http\Controllers\PageController::class);

    Route::resource('billing', App\Http\Controllers\BillingController::class);

    Route::resource('invoice', App\Http\Controllers\PaymentController::class);

    Route::resource('recruit', App\Http\Controllers\WriterController::class);

    Route::resource('message', App\Http\Controllers\MessageController::class);
    
});

