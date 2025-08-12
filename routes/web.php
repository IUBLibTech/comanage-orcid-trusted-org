<?php

use Illuminate\Support\Facades\Route;
use Subfission\Cas\Facades\Cas;
use App\Http\Controllers\ApiDataController;

Route::get('/', function () {
    return view('rivet');
})->middleware('cas.auth');

Route::get('/comanage', [ApiDataController::class, 'getRecord'])->middleware('cas.auth');

Route::get('/orcid', function () {
	return view('orcid');
})->middleware('cas.auth');

