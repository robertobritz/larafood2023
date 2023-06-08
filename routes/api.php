<?php

use App\Http\Controllers\Api\Auth\AuthClientController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\TableApiController;
use App\Http\Controllers\Api\TenantApiController;
use App\Models\Client;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'

], function() {

Route::get('/tenants/{uuid}', [TenantApiController::class, 'show']);
Route::get('/tenants', [TenantApiController::class, 'index']);

Route::get('/categories/{url}', [CategoryApiController::class, 'show']);
Route::get('/categories', [CategoryApiController::class, 'categoriesByTenant']);

Route::get('/tables/{identify}', [TableApiController::class, 'show']);
Route::get('/tables', [TableApiController::class, 'tablesByTenant']);

Route::get('/products/{flag}', [ProductApiController::class, 'show']);
Route::get('/products', [ProductApiController::class, 'productsByTenant']);

});

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api\Auth'
], function() {
Route::post('client', [RegisterController::class, 'store']);
});

Route::group([
    'namespace' => 'Api\Auth'
], function() {
    Route::post('sanctum/token', [AuthClientController::class, 'auth']);
});

Route::group([
    'namespace' => 'Api\Auth',
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('auth/me', [AuthClientController::class, 'me']);
    Route::post('auth/logout', [AuthClientController::class, 'logout']);
});