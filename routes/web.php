<?php

use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'));

Route::get('/create-resume', fn() => view('create-resume'));

Route::get('/results', fn() => view('results'));