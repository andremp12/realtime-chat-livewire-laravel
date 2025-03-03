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

Route::get('/register', \App\Livewire\Register::class)->name('register');
//Route::post('/register', function () {});
Route::get('/login', \App\Livewire\Login::class)->name('login');
//Route::post('/login', function () {});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard',\App\Livewire\Dashboard::class)->name('dashboard');
});
