<?php

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

Route::middleware(['web'])->group(function() {
    Route::match(['get', 'post'], '/', 'IndexController@index')->name('home');
    Route::get('page/{alias}', 'PageController@index')->name('page');

    Route::auth();
});

Route::prefix('admin')->middleware('auth')->group(function() {
    Route::resource('pages', 'PagesController');
    Route::resource('portfolio', 'PortfolioController');
    Route::resource('employees', 'EmployeesController');
    Route::resource('services', 'ServicesController');
});


