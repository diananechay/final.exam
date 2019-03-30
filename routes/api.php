<?php

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

Route::post('register', 'Auth\RegisterController@register');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');



Route::group(['middleware' => 'auth:api'], function () {
    // User
    Route::delete('user/{user}', 'UserController@destroy');
    Route::get('user','UserController@index');
    Route::get('user/{user}','UserController@show');
    Route::put('user/{user}', 'UserController@update');
    Route::get('us','UserController@statistics');
    // Organization
    Route::delete('organization/{organization}', 'OrganizationController@destroy');
    Route::get('organization/{organization}','OrganizationController@show');
    Route::post('organization','OrganizationController@store');
    Route::get('organization','OrganizationController@index');
    Route::put('organization/{organization}', 'OrganizationController@update');
    Route::get('org','OrganizationController@statistics');
     // Vacancy
    Route::delete('vacancy/{vacancy}', 'VacancyController@destroy');
    Route::get('vacancy/{vacancy}','VacancyController@show');
    Route::post('vacancy','VacancyController@store');
    Route::get('vacancy','VacancyController@index');
    Route::put('vacancy/{vacancy}', 'VacancyController@update');
    Route::get('vac','VacancyController@statistics');

    Route::post('order','OrderController@store');
    Route::delete('order/{order}', 'OrderController@destroy');
    Route::get('order','OrderController@index');
    Route::get('ord','OrderController@showAllVacancy');
});
