<?php

use App\Http\Controllers\Spatie\PermissionController;
use App\Http\Controllers\Spatie\RoleController;
use App\Http\Controllers\Spatie\RolePermissionController;
use Illuminate\Support\Facades\Route;


Route::resource('/roles', RoleController::class);
Route::resource('/permissions', PermissionController::class);
Route::put('roles/{role}/permissions', [RolePermissionController::class, 'update'])->name('RolePermission.update');


