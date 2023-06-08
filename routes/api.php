<?php

use App\Http\Controllers\Api\Auth\AuthClientController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\TableApiController;
use App\Http\Controllers\Api\TenantApiController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'v1',
    'namespace' => 'Api'

], function() {

Route::get('/tenants/{uuid}', [TenantApiController::class, 'show']);
Route::get('/tenants', [TenantApiController::class, 'index']);

Route::get('/categories/{identify}', [CategoryApiController::class, 'show']);
Route::get('/categories', [CategoryApiController::class, 'categoriesByTenant']);

Route::get('/tables/{identify}', [TableApiController::class, 'show']);
Route::get('/tables', [TableApiController::class, 'tablesByTenant']);

Route::get('/products/{identify}', [ProductApiController::class, 'show']);
Route::get('/products', [ProductApiController::class, 'productsByTenant']);

Route::post('/orders', [OrderApiController::class, 'store']);
Route::post('/orders{identify}', [OrderApiController::class, 'show']);


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