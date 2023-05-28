<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TenantApiController;

Route::get('/tenants', [TenantApiController::class, 'index']);

