<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WineController;
 
Route::get('/', function () {
    return view('welcome');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

// returns the home page with all wines
Route::get('/wines/list', WineController::class . '@index')->name('wines.index');
// returns the form for adding a post
Route::get('/wines/create', WineController::class . '@create')->name('wines.create');
// adds a post to the database
Route::post('/wines', WineController::class .'@store')->name('wines.store');
// returns a page that shows a full post
Route::get('/wines/{wine}', WineController::class .'@show')->name('wines.show');
// returns the form for editing a post
Route::get('/wines/{wine}/edit', WineController::class .'@edit')->name('wines.edit');
// updates a post
Route::put('/wines/{wine}', WineController::class .'@update')->name('wines.update');
// deletes a post
Route::delete('/wines/{wine}', WineController::class .'@destroy')->name('wines.destroy');