<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware'=>['auth:sanctum']], function(){
	Route::get('/animal/all', 'AnimalController@getAnimalAll');
	Route::post('/animal', 'AnimalController@store');
	Route::delete('/animal/{id}', 'AnimalController@destroy');
	Route::get('/animal/{id}/edit', 'AnimalController@edit');
	Route::patch('/animal/{id}', 'AnimalController@update');

	Route::get('/rescuer/all', 'RescuerController@getRescuerAll');
	Route::post('/rescuer', 'RescuerController@store');
	Route::delete('/rescuer/{id}', 'RescuerController@destroy');
	Route::get('/rescuer/{id}/edit', 'RescuerController@edit');
	Route::patch('/rescuer/{id}', 'RescuerController@update');

	Route::get('/shelter_personnel/all','ShelterPersonnelController@getShelterPersonnelAll');
	Route::post('/shelter_personnel', 'ShelterPersonnelController@store');
	Route::delete('/shelter_personnel/{id}', 'ShelterPersonnelController@destroy');
	Route::get('/shelter_personnel/{id}/edit', 'ShelterPersonnelController@edit');
	Route::patch('/shelter_personnel/{id}', 'ShelterPersonnelController@update');

	Route::get('/disease_injury/all', 'DiseaseInjuryController@getDiseaseInjuryAll');
	Route::post('/disease_injury', 'DiseaseInjuryController@store');
	Route::delete('/disease_injury/{id}', 'DiseaseInjuryController@destroy');
	Route::get('/disease_injury/{id}/edit', 'DiseaseInjuryController@edit');
	Route::patch('/disease_injury/{id}', 'DiseaseInjuryController@update');

	Route::get('/adopter/all', 'AdopterController@getAdopterAll');
	Route::post('/adopter', 'AdopterController@store');
	Route::delete('/adopter/{id}', 'AdopterController@destroy');
	Route::get('/adopter/{id}/edit', 'AdopterController@edit');
	Route::patch('/adopter/{id}', 'AdopterController@update');
// });

Route::get('/pet_lover/all', 'PetLoverController@getPetLoverAll');
Route::get('/adoptable_animal/all', 'HomeController@getAdoptableAnimal');

Route::get('/adoptable_animal/search/{term?}', 'HomeController@search');

Route::get('/dashboard/chartRescued/{date}',['uses' => 'DashboardController@chartRescued' , 'as'=>'dashboard.chartRescued']);
Route::get('/dashboard/chartAdopted/{date}',['uses' => 'DashboardController@chartAdopted' , 'as'=>'dashboard.chartAdopted']);
Route::get('dashboard',['uses'=>'DashboardController@index','as'=>'dashboard.index']);
