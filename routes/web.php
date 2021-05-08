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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'Controller@accueil');

Route::get('/UI_UX', 'Controller@membre_UI_UX');

Route::get('/qe', 'Controller@membre_qualité_exploitation');

Route::get('/back', 'Controller@membre_back');

Route::get('/admin', 'Controller@membre_admin');

Route::get('/membres', 'Controller@membres');

Route::get('/actif', 'Controller@membre_actif');
