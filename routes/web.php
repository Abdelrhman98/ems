<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\PermissionController;
use App\Http\Controllers\auth\LogoutController;
use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\items\EquipmentController;

Route::get('/', function () {return view('home');})->name('home');

//auth
Route::resource('/login', LoginController::class, ['only' => ['index' , 'store'],]);

Route::resource('/register', RegisterController::class, ['only' => ['index' , 'store'],]);

Route::get('/logout', LogoutController::class);
//permission
Route::resource('/permissions', PermissionController::class);

//items
Route::resource('/equipments', EquipmentController::class);


//select2 search
Route::get('/company/search', [AutocompleteController::class, 'company']);
Route::get('/equipment_group/search', [AutocompleteController::class, 'equipmentGroup']);
Route::get('/equipment_status/search', [AutocompleteController::class, 'equipmentStatus']);
Route::get('/site/search', [AutocompleteController::class, 'site']);



