<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('products', 'ProductController')->names('products');
Route::resource('sales', 'SaleController')->names('sales');
Route::resource('purchases', 'PurchaseController')->names('purchases');
Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('roles', 'RoleController')->names('roles');
Route::resource('users', 'UserController')->names('users');
Route::resource('projects', 'ProjectController')->names('projects');
Route::resource('cities', 'CityController')->names('cities');
Route::resource('files', 'FileController')->names('files');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');





