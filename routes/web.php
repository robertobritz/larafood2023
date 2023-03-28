<?php

use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\DetailPlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;

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
    //Permission x Profile
    Route::get('admin/profiles/{id}/permission/{idPermission}/detach', 'App\Http\Controllers\Admin\ACL\PermissionProfileController@detachPermissionProfile')->name('profiles.permission.detach');
    Route::any('admin/profiles/{id}/permissions/create', 'App\Http\Controllers\Admin\ACL\PermissionProfileController@permissionsAvailable')->name('profiles.permissions.available');
    Route::post('admin/profiles/{id}/permissions', 'App\Http\Controllers\Admin\ACL\PermissionProfileController@attachPermissionsProfile')->name('profiles.permissions.attach');
    Route::get('admin/profiles/{id}/permissions', 'App\Http\Controllers\Admin\ACL\PermissionProfileController@permissions')->name('profiles.permissions');
    Route::get('admin/permissions/{id}/profile', 'App\Http\Controllers\Admin\ACL\PermissionProfileController@profiles')->name('permissions.profiles');
    

    
    //Routes Permission

    Route::any('admin/permissions/search', 'App\Http\Controllers\Admin\ACL\PermissionController@search')->name('permissions.search');
    Route::resource('admin/permissions', 'App\Http\Controllers\Admin\ACL\PermissionController');

    //Routes Profile

    Route::any('admin/profiles/search', 'App\Http\Controllers\Admin\ACL\ProfileController@search')->name('profiles.search');
    Route::resource('admin/profiles', 'App\Http\Controllers\Admin\ACL\ProfileController');
    
Route::prefix('admin')
        ->namespace('Admin')
        ->group(function(){
 
    //Routes Details 
            
    Route::get('plans/{url}/details/create', [DetailPlanController::class, 'create'])->name('details.plan.create');        
    Route::delete('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'destroy'])->name('details.plan.destroy');
    Route::get('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'show'])->name('details.plan.show');
    Route::put('plans/{url}/details/{idDetail}', [DetailPlanController::class, 'update'])->name('details.plan.update');
    Route::get('plans/{url}/details/{idDetail}/edit', [DetailPlanController::class, 'edit'])->name('details.plan.edit');
    Route::post('plans/{url}/details', [DetailPlanController::class, 'store'])->name('details.plan.store');
    Route::get('plans/{url}/details', [DetailPlanController::class, 'index'])->name('details.plan.index');


    //Routes Plans

    Route::get('plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::put('plans/{url}', [PlanController::class, 'update'])->name('plans.update');
    Route::get('plans/{url}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::any('plans/search', [PlanController::class, 'search'])->name('plans.search');
    Route::delete('plans/{url}', [PlanController::class, 'destroy'])->name('plans.destroy');
    Route::get('plans/{url}', [PlanController::class, 'show'])->name('plans.show');
    Route::post('plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('plans', [PlanController::class, 'index'])->name('plans.index');

    //Home Dashboard
    Route::get('/', [PlanController::class, 'index'])->name('admin.index');
});
    //Route::resource('profiles', 'App\Http\Controllers\Admin\ACL\ProfileController');
    



Route::get('/', function () {
    return view('welcome');
});
