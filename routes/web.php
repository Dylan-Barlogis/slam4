<?php

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
//Route pour afficher la page accueil
Route::get('/', "FrontController@accueil")->name("accueil");
//Route pour afficher la page du règlement
Route::get('/reglement', "FrontController@reglement")->name("reglement");
//Route pour afficher la page des convocations
Route::get('/les-convocations', "FrontController@lesConvocations")->name("lesConvocations");
//Route pour le CRUD
Route::resource('/convocation','ConvocationController')->middleware('admin');
// Route pour la connection des sessions
Auth::routes();
//Route pour afficher la page home
Route::get('/home', 'HomeController@index')->name('home');

//Routes pour les éléves
Route::resource('/eleve', 'EleveController');

//Routes pour les motifs
Route::resource('/motif', 'MotifController');
Route::get('/convocationEleve', 'ConvocationController@indexEleve')->name('convocationEleve');