<?php

// routes
use App\Http\Controllers\TestAccessController;

Route::post('/test-access/import-file', [TestAccessController::class, 'importFromFile']);
