<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoxesController;
use App\Models\Box;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.index', [ 'createdBoxesCount' => Box::all()->count() ]);
})->name('index');

Route::get('/boxes', [BoxesController::class, 'index'])->name('boxes');
Route::post('/boxes', [BoxesController::class, 'create'])->name('post-boxes');

Route::get('boxes/{box_name}', [BoxesController::class, 'items'])->name('items');
Route::post('boxes/{box_name}', [BoxesController::class, 'insert'])->name('post-items');

Route::view('/registration', 'pages.registration')->name('registration');
Route::view('/login', 'pages.login')->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('_registration');
Route::post('/login', [AuthController::class, 'login'])->name('_login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
