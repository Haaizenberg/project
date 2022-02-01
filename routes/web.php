<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


Route::get('/', function(Request $request) {
    $people = session('people', []);

    if (count($people) == 0) {
        return 'The room is full of people who care…';
    } else {
        $message = 'There ';
        if (count($people) == 1) {
            $message .= 'is ';
        } else {
            $message .= 'are ';
        }

        foreach ($people as $i => $name) {
            if ($i == count($people) - 1 &&  count($people) > 1) {
                $message = substr($message, 0, -2);
                $message .= ' and ';
            }
            $message .= "$name, ";
        }

        $message = substr($message, 0, -2);

        $message .= ' in the room';

        return $message;
    }
});

Route::post('/', function (Request $request) {
    if (!Session::has('people')) {
        Session::put('people', []);
    }

    // dump($request->input());
    $name = $request->input('name', '');
    if ($name) {
        Session::push('people', $name);
    }
});