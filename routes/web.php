<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PecaController;

Route::get('/', function () {
    return redirect()->route('pecas.index');
});

Route::resource('pecas', PecaController::class);