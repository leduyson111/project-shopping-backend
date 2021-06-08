<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPermissionController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminRoleControler;
use App\Http\Controllers\AdminUserController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SilderController;
use App\Http\Controllers\SettingsController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', [AdminController::class, 'loginAdmin']);
Route::post('/admin', [AdminController::class, 'postLoginAdmin']);
Route::get('/logout', [AdminController::class, 'logout']);

// Route::get('/login' ,[AdminController::class, 'loginAdmin']);
// Route::post('/login', [AdminController::class, 'postLoginAdmin'] );
 


Route::prefix('admin' )->group(function(){
    Route::prefix('categories')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->middleware('can:/categories');
        Route::get('/create',[CategoryController::class, 'create'])->middleware('can:/categories/add');
        Route::post('/store', [CategoryController::class, 'store']);
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->middleware('can:/categories/edit');
        Route::post('/update/{id}', [CategoryController::class, 'update']);
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->middleware('can:/categories/delete');
    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->middleware('can:/menus');
        Route::get('/create',[MenuController::class, 'create'])->middleware('can:/menus/add');
        Route::post('/store', [MenuController::class, 'store']);
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->middleware('can:/menus/edit');
        Route::post('/update/{id}', [MenuController::class, 'update']);
        Route::get('/delete/{id}', [MenuController::class, 'delete'])->middleware('can:/menus/delete');
    });


    Route::prefix('product')->group(function () {
        Route::get('/', [AdminProductController::class, 'index'])->middleware('can:/products');
        Route::get('/create', [AdminProductController::class , 'create'])->middleware('can:/products/add');
        Route::post('/store', [AdminProductController::class , 'store']);
        Route::get('/edit/{id}', [AdminProductController::class , 'edit'])->middleware('can:/products/edit');
        Route::post('/update/{id}', [AdminProductController::class, 'update']);
        Route::get('/delete/{id}', [AdminProductController::class, 'delete'])->middleware('can:/products/delete');
    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [SilderController::class,'index'])->middleware('can:/slider');
        Route::get('/create', [SilderController::class , 'create'])->middleware('can:/slider/add');
        Route::post('/store', [SilderController::class , 'store']);
        Route::get('/edit/{id}', [SilderController::class , 'edit'])->middleware('can:/slider/edit');
        Route::post('/update/{id}', [SilderController::class, 'update']);
        Route::get('/delete/{id}', [SilderController::class, 'delete'])->middleware('can:/slider/delete');
    });


    Route::prefix('settings')->group(function () {
        Route::get('/', [SettingsController::class,'index'])->middleware('can:/settings');
        Route::get('/create', [SettingsController::class , 'create'])->middleware('can:/settings/add');
        Route::post('/store', [SettingsController::class , 'store']);
        Route::get('/edit/{id}', [SettingsController::class , 'edit'])->middleware('can:/settings/edit');
        Route::post('/update/{id}', [SettingsController::class, 'update']);
        Route::get('/delete/{id}', [SettingsController::class, 'delete'])->middleware('can:/settings/delete');
    });


    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUserController::class,'index'])->middleware('can:/users');
        Route::get('/create', [AdminUserController::class , 'create'])->middleware('can:/users/add');
        Route::post('/store', [AdminUserController::class , 'store']);
        Route::get('/edit/{id}', [AdminUserController::class , 'edit'])->middleware('can:/users/edit');
        Route::post('/update/{id}', [AdminUserController::class, 'update']);
        Route::get('/delete/{id}', [AdminUserController::class, 'delete'])->middleware('can:/users/delete');
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [AdminRoleControler::class,'index'])->middleware('can:/roles');
        Route::get('/create', [AdminRoleControler::class , 'create'])->middleware('can:/roles/add');
        Route::post('/store', [AdminRoleControler::class , 'store']);
        Route::get('/edit/{id}', [AdminRoleControler::class , 'edit'])->middleware('can:/roles/edit');
        Route::post('/update/{id}', [AdminRoleControler::class, 'update']);
        Route::get('/delete/{id}', [AdminRoleControler::class, 'delete'])->middleware('can:/roles/delete');
    });

    Route::prefix('permissions')->group(function () {
        Route::get('/create', [AdminPermissionController::class , 'createPermissions']);
        Route::post('/store', [AdminPermissionController::class , 'store']);
       
    });

});


