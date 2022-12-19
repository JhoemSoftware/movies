<?php

use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/movies', [MovieController::class, 'index'])->name('projects.index');