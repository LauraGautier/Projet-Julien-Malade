<?php

use App\Http\Controllers\HealthController;

Route::post('/update-status', [HealthController::class, 'updateStatus']);
