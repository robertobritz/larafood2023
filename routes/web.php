<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('admin/plans/create', [Admin\PlanController::class, 'create'])->name('plans.create');
Route::put('admin/plans/{url}', [Admin\PlanController::class, 'update'])->name('plans.update');
Route::get('admin/plans/{url}/edit', [Admin\PlanController::class, 'edit'])->name('plans.edit');
Route::any('admin/plans/search', [Admin\PlanController::class, 'search'])->name('plans.search');
Route::delete('admin/plans/{url}', [Admin\PlanController::class, 'destroy'])->name('plans.destroy');
Route::get('admin/plans/{url}', [Admin\PlanController::class, 'show'])->name('plans.show');
Route::post('admin/plans', [Admin\PlanController::class, 'store'])->name('plans.store');
Route::get('admin/plans', [Admin\PlanController::class, 'index'])->name('plans.index');

Route::get('admin', [Admin\PlanController::class, 'index'])->name('admin.index');

Route::get('/', function () {
    return view('welcome');
});
