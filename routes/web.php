<?php

use App\Http\Controllers\Admin\ACL\PermissionProfileController;
use App\Http\Controllers\Admin\ACL\PlanProfileController;
use App\Http\Controllers\Admin\ACL\ProfileController;
use App\Http\Controllers\Admin\DetailPlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Site\SiteController;


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

    //Routes Tables

    Route::any('admin/tables/search', 'App\Http\Controllers\Admin\TableController@search')->name('tables.search')->middleware('auth');
    Route::resource('admin/tables', 'App\Http\Controllers\Admin\TableController')->middleware('auth');


     //Routes Products

     Route::any('admin/products/search', 'App\Http\Controllers\Admin\ProductController@search')->name('products.search')->middleware('auth');
     Route::resource('admin/products', 'App\Http\Controllers\Admin\ProductController')->middleware('auth');

    //Routes Categories

    Route::any('admin/categories/search', 'App\Http\Controllers\Admin\CategoryController@search')->name('categories.search')->middleware('auth');
    Route::resource('admin/categories', 'App\Http\Controllers\Admin\CategoryController')->middleware('auth');


    //Routes Users

    Route::any('admin/users/search', 'App\Http\Controllers\Admin\UserController@search')->name('users.search')->middleware('auth');
    Route::resource('admin/users', 'App\Http\Controllers\Admin\UserController')->middleware('auth');

    //Routes Permission

    Route::any('admin/permissions/search', 'App\Http\Controllers\Admin\ACL\PermissionController@search')->name('permissions.search')->middleware('auth');
    Route::resource('admin/permissions', 'App\Http\Controllers\Admin\ACL\PermissionController')->middleware('auth');

    //Routes Profile

    Route::any('admin/profiles/search', 'App\Http\Controllers\Admin\ACL\ProfileController@search')->name('profiles.search')->middleware('auth');
    Route::resource('admin/profiles', 'App\Http\Controllers\Admin\ACL\ProfileController')->middleware('auth');

     /**
     * Product x Category
     */
    Route::get('admin/products/{id}/category/{idCategory}/detach', 'App\Http\Controllers\Admin\CategoryProductController@detachCategoryProduct')->name('products.category.detach')->middleware('auth');
    Route::post('admin/products/{id}/categories', 'App\Http\Controllers\Admin\CategoryProductController@attachCategoryProduct')->name('products.categories.attach')->middleware('auth');
    Route::any('admin/products/{id}/categories/create', 'App\Http\Controllers\Admin\CategoryProductController@categoriesAvailable')->name('products.categories.available')->middleware('auth');
    Route::get('admin/products/{id}/categories', 'App\Http\Controllers\Admin\CategoryProductController@categories')->name('products.categories')->middleware('auth');
    Route::get('admin/categories/{id}/products', 'App\Http\Controllers\Admin\CategoryProductController@products')->name('categories.products')->middleware('auth'); 


    Route::prefix('admin')
    ->namespace('Admin\ACL')
    ->middleware('auth')
    ->group(function(){

    /**
     * Plan x Profile
     */
    Route::get('plans/{id}/profile/{idProfile}/detach', [PlanProfileController::class, 'detachProfilePlan'])->name('plans.profile.detach');
    Route::post('plans/{id}/profiles', [PlanProfileController::class, 'attachProfilesPlan'])->name('plans.profiles.attach');
    Route::any('plans/{id}/profiles/create', [PlanProfileController::class, 'profilesAvailable'])->name('plans.profiles.available');
    Route::get('plans/{id}/profiles', [PlanProfileController::class, 'profiles'])->name('plans.profiles');
    Route::get('profiles/{id}/plans', [PlanProfileController::class, 'plans'])->name('profiles.plans');


    //Permission x Profile
    Route::get('profiles/{id}/permission/{idPermission}/detach', [PermissionProfileController::class, 'detachPermissionProfile'])->name('profiles.permission.detach');
    Route::any('profiles/{id}/permissions/create', [PermissionProfileController::class, 'permissionsAvailable'])->name('profiles.permissions.available');
    Route::post('profiles/{id}/permissions', [PermissionProfileController::class, 'attachPermissionsProfile'])->name('profiles.permissions.attach');
    Route::get('profiles/{id}/permissions', [PermissionProfileController::class, 'permissions'])->name('profiles.permissions');
    Route::get('permissions/{id}/profile', [PermissionProfileController::class, 'profiles'])->name('permissions.profiles');
    
    });


    Route::prefix('admin')
        ->namespace('Admin')
        ->middleware('auth')
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
    //Site
    Route::get('/plan/{url}', [SiteController::class, 'plan'])->name('plan.subscription');
    Route::get('/', [SiteController::class, 'index'])->name('site.home');



    //Routes create by the login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
