<?php

use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\TableApiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TenantApiController;

Route::get('/tenants/{uuid}', [TenantApiController::class, 'show']);
Route::get('/tenants', [TenantApiController::class, 'index']);

Route::get('/categories/{url}', [CategoryApiController::class, 'show']);
Route::get('/categories', [CategoryApiController::class, 'categoriesByTenant']);

Route::get('/tables/{identify}', [TableApiController::class, 'show']);
Route::get('/tables', [TableApiController::class, 'tablesByTenant']);
