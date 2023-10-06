<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/plan-stale', function () {
    return view('stale');
});
Route::get('/plan-planowane', function () {
    return view('planowane');
});
Route::get('/dzienne', function () {
    return view('dzienne');
});
