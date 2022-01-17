<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Request;


Route::get('/', function(Request $request) {
    $name = $request->name ?? 'Dima';
    return "Hello, $name!";
});
