<?php

use App\Livewire\PlanowaneList;
use App\Livewire\StaleList;
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

//Route::get('/plan-stale', [StaleList::class, 'render']);
//Route::get('/plan-planowane', [PlanowaneList::class, 'render']);
