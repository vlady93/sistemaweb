<?php

use App\Http\Controllers\ReportController;
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

Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day_sales');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date_sales');


Route::get('purchases/reports_day_purchase', 'ReportController@reports_day_purchase')->name('reports.day_purchase');
Route::get('purchases/reports_date_purchase', 'ReportController@reports_date_purchase')->name('reports.date_purchase');

Route::get('projects/reports_day_project', 'ReportController@reports_day_project')->name('reports.day_project');
Route::get('projects/reports_date_project', 'ReportController@reports_date_project')->name('reports.date_project');

Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');
Route::post('purchases/report_results_purchase', 'ReportController@report_results_purchase')->name('report.results_purchase');
Route::post('projects/report_results_project', 'ReportController@report_results_project')->name('report.results_project');


Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('products', 'ProductController')->names('products');
Route::resource('sales', 'SaleController')->names('sales');
Route::resource('purchases', 'PurchaseController')->names('purchases');
Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('roles', 'RoleController')->names('roles');
Route::resource('users', 'UserController')->names('users');
Route::resource('projects', 'ProjectController')->names('projects');
Route::resource('projectnews', 'ProjectNewsController')->names('projectnews');
Route::resource('cities', 'CityController')->names('cities');
Route::resource('files', 'FileController')->names('files');
Route::get('home', 'HomeController@index')->name('home');

Route::get('prods', 'ProductController@lowmaterial')->name('prods');



Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('projects/pdf/{project}', 'ProjectController@pdf')->name('projects.pdf');
Route::get('projects/pdf_new_project/{project}', 'ProjectController@pdf_new_project')->name('projects.pdfn');
Route::get('products/pdf/{product}', 'ProductController@pdf')->name('products.pdf');
Route::get('products/materiales/{product}', 'ProductController@pdfmaterial')->name('products.pdf_material');


/* Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    return view('home');
})->name('home'); */





