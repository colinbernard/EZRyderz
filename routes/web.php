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

/*
 * Route for main welcome page
 */
Route::get('/', function () {
    return view('welcome');
});

/*
 * Route for about page
 */
Route::get('/about', function() {
	return view('about');
});

/*
 * Route for user profiles
 */
Route::get('/profile/{id?}', 'ProfileController@show')->where('id', '[0-9]+'); // id must be integer

/*
 * Route for login page
 */
Route::get('/login', function() {
	return view('login');
});



Auth::routes();

Route::get('/home', 'HomeController@index');
