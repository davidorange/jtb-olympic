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

Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/home', function () {
    return view('frontend.index');
});
Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
Route::get('/clear-route', function() {
    Artisan::call('route:clear');
    return "Cache is route";
});
Route::get('/clear-config', function() {
    Artisan::call('config:clear');
    return "Cache is config";
});
Route::get('/clear-view', function() {
    Artisan::call('view:clear');
    return "Cache is view";
});