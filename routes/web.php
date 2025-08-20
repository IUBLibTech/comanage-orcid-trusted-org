<?php

use Illuminate\Support\Facades\Route;
use Subfission\Cas\Facades\Cas;
use App\Http\Controllers\ComanageApiController;
use App\Http\Controllers\OrcidApiController;

Route::get('/', function () {
    return view('rivet');
})->middleware('cas.auth');

Route::get('/comanage', [ComanageApiController::class, 'getAccessToken'])->middleware('cas.auth');

Route::get('/orcid', [OrcidApiController::class, 'fetchByOrcid'])->middleware('cas.auth');
