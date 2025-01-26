<?php

use App\ResumeTemplates\TemplateType;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'));

Route::get('/create-resume', fn() => view('create-resume'));

Route::get('/results', fn() => view('results'))->name('results');

Route::get('/templates/{templateType}',
    fn(TemplateType $templateType) => view('template', ['templateType' => $templateType]))->name('template');