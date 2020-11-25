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

Auth::routes();

Route::resource('cities', \CityController::class)->except('show');
Route::resource('programs', \ProgramController::class)->except('show');
Route::resource('blogs', \BlogController::class);
Route::resource('gyms', \GymController::class);
Route::resource('programsmembers', \ProgramMemberController::class);

Route::get('trainers', \TrainerController::class)->name('trainers.index');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
});
