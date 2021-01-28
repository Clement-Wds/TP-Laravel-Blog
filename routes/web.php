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

//PAGE HOME
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


//PROFIL UTILISATEUR
//Affichage du profil (mon profil)
Route::get('/profile', 'App\Http\Controllers\UserController@formProfile');
//Edition du Profil
Route::get('/edit_profile', 'App\Http\Controllers\UserController@formEditProfile');
Route::post('/edit_profile', 'App\Http\Controllers\UserController@editProfile');
//Modification du mot de passe
Route::get('/change_password', 'App\Http\Controllers\UserController@formChangePassword');
Route::post('/change_password', 'App\Http\Controllers\UserController@changePassword');
//Suppression du profil
Route::get('/delete_profile','App\Http\Controllers\UserController@deleteUser');


//PROFIL PUBLIC
Route::get('/users', 'App\Http\Controllers\UserController@listUsers');
Route::get('/users/profile/{id}', 'App\Http\Controllers\UserController@publicProfile')->name('profile.User');


//GESTION DES POSTS
Route::get('/create_post', 'App\Http\Controllers\PostController@formCreatePost');
Route::post('/new_post','App\Http\Controllers\PostController@createPost');
Route::get('/edit_post/{id}', 'App\Http\Controllers\PostController@formEditPost')->name('edit.Post');
Route::post('/edit_post/{id}/send', 'App\Http\Controllers\PostController@editPost');
Route::get('/delete_post/{id}', 'App\Http\Controllers\PostController@deletePost')->name('delete.Post');