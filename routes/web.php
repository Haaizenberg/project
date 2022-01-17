<?php

use App\Http\Controllers\BoxesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


Route::get('/', function () {
    $createdBoxesCount = count(Session::get('boxes', []));
    return view('pages.index', [ 'createdBoxesCount' => $createdBoxesCount ]);
});

Route::get('/boxes', [BoxesController::class, 'index']);
Route::post('/boxes', [BoxesController::class, 'create']);

Route::post('boxes/{box_name}', [BoxesController::class, 'insert']);
Route::get('boxes/{box_name}', [BoxesController::class, 'items']);

