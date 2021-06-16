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
    return view('test');
});
Route::get('/recover', function () {
    return view('recover');
});
Route::get('/accueil', function () {
    return view('accueil');
});
Route::get('/utilisateur', function () {
    return view('utilisateurs/utilisateur');
});
Route::get('/calendrier', function () {
    return view('calendriers/calendrier');
});
Route::get('/projet', function () {
    return view('projets/projet');
});
Route::get('/email-compose', function () {
    return view('email/email-compose');
});
Route::get('/email-inbox', function () {
    return view('email/email-inbox');
});
Route::get('/email-read', function () {
    return view('email/email-read');
});


Route::get('/module', function () {
    return view('modules/module');
});
Route::get('/tache', function () {
    return view('taches/tache');
});
