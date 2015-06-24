<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|

Route::get('/', function()
{
    return 'Hello World';
});
*/

Route::model('AZAraea', 'AZArea');
Route::model('AZDatabase', 'AZDatabase');
Route::model('AZDatabaseArea', 'AZDatabaseArea');
Route::model('AZDatabaseSubject', 'AZDatabaseSubject');
Route::model('AZSubject', 'AZSubject');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::resource('AZDatabase', 'AZDatabaseController');
Route::resource('AZArea', 'AZAreaController');
Route::resource('AZSubject', 'AZSubjectController');
Route::resource('AZDatabaseArea', 'AZDatabaseAreaController');
Route::resource('AZDatabaseSubject', 'AZDatabaseSubjectController');
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('area/subject/{area_id}', [
    'as' => 'area_subject', 'uses' => 'AZSubjectController@byArea'
]);
Route::get('database/list', [
    'as' => 'database_list', 'uses' => 'AZDatabaseController@index'
]);
Route::get('database/list/{list}', [
    'as' => 'database_list', 'uses' => 'AZDatabaseController@index'
]);
Route::get('database/subject/{subject_id}', [
    'as' => 'database_subject', 'uses' => 'AZDatabaseController@bySubject'
]);
Route::get('database/az/{letter}', [
    'as' => 'database_subject', 'uses' => 'AZDatabaseController@byLetter'
]);
Route::get('database/search/{term}', [
    'as' => 'database_subject', 'uses' => 'AZDatabaseController@search'
]);
Route::get('database/area/{area_id}', [
    'as' => 'database_area', 'uses' => 'AZDatabaseController@byArea'
]);
