<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WineController;
use App\Http\Controllers\IngredientController;
 
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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/wines/list', WineController::class . '@index')->name('wines.index');
    Route::get('/wines/create', WineController::class . '@create')->name('wines.create');
    Route::post('/wines', WineController::class .'@store')->name('wines.store');
    Route::get('/wines/{wine}', WineController::class .'@show')->name('wines.show');
    Route::get('/wines/{wine}/edit', WineController::class .'@edit')->name('wines.edit');
    Route::put('/wines/{wine}', WineController::class .'@update')->name('wines.update');
    Route::delete('/wines/{wine}', WineController::class .'@destroy')->name('wines.destroy');

    Route::get('/ingredients/list', IngredientController::class . '@index')->name('ingredients.index');
    Route::get('/ingredients/create', IngredientController::class . '@create')->name('ingredients.create');
    Route::post('/ingredients', IngredientController::class .'@store')->name('ingredients.store');
    Route::get('/ingredients/{ingredient}', IngredientController::class .'@show')->name('ingredients.show');
    Route::get('/ingredients/{ingredient}/edit', IngredientController::class .'@edit')->name('ingredients.edit');
    Route::put('/ingredients/{ingredient}', IngredientController::class .'@update')->name('ingredients.update');
    Route::delete('/ingredients/{ingredient}', IngredientController::class .'@destroy')->name('ingredients.destroy');
});

route::delete('/{id}',[HomeController::class,'delete_row']);