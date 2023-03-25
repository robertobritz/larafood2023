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

Route::delete('admin/plans/{url}', [Admin\PlanController::class, 'destroy'])->name('plans.destroy');
Route::get('admin/plans/{url}', [Admin\PlanController::class, 'show'])->name('plans.show');
Route::post('admin/plans', [Admin\PlanController::class, 'store'])->name('plans.store');
Route::get('admin/plans/create', [Admin\PlanController::class, 'create'])->name('plans.create');
Route::get('admin/plans', [Admin\PlanController::class, 'index'])->name('plans.index');



Route::get('/', function () {
    return view('welcome');
});
