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

Route::get('/', ['uses' => 'HomeController@index', 'as' => 'home']);

Route::group(['middleware' => ['auth']], function()
{
	Route::resource('animal', 'AnimalController');
	Route::resource('rescuer', 'RescuerController');
	Route::resource('shelter_personnel', 'ShelterPersonnelController');
	Route::resource('disease_injury', 'DiseaseInjuryController');
	Route::resource('adopter', 'AdopterController');
	Route::resource('dashboard', 'DashboardController');
});

Auth::routes();

Route::resource('pet_lover', 'PetLoverController');
Route::get('/show/{id}', ['uses' => 'AnimalController@show', 'as' => 'show']);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');