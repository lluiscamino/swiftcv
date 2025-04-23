<?php

use App\ResumeTemplates\TemplateType;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('home'));

Route::get('/create-resume', fn() => view('create-resume'));

Route::get('/results', function () {
    if (!session()->has('resumes') || !session()->has('formUrl')) {
        abort(404);
    }
    return view('results');
})->name('results');

Route::get('/templates/{templateType}',
    fn(TemplateType $templateType) => view('template', ['templateType' => $templateType]))->name('template');