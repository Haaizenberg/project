<?php

use App\Http\Controllers\BoxesController;
use App\Models\Box;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('pages.index', [ 'createdBoxesCount' => Box::all()->count() ]);
})->name('index');

Route::get('/boxes', [BoxesController::class, 'index'])->name('boxes');
Route::post('/boxes', [BoxesController::class, 'create'])->name('post-boxes');

Route::post('boxes/{box_name}', [BoxesController::class, 'insert'])->name('post-items');
Route::get('boxes/{box_name}', [BoxesController::class, 'items'])->name('items');
