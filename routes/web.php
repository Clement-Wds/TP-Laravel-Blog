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
    return view('home');
});

//INSCRIPTION
Route::get('/inscription', 'App\Http\Controllers\InscriptionController@form');
Route::post('/inscription', 'App\Http\Controllers\InscriptionController@createUser');

//CONNEXION
Route::get('/connexion', 'App\Http\Controllers\ConnexionController@form');
Route::post('/connexion', 'App\Http\Controllers\ConnexionController@connexion');

//DECONNEXION
Route::get('/signout', 'App\Http\Controllers\UserAccountController@signout');