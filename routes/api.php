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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('skills', 'App\Http\Controllers\ApiSkillsController');

Route::resource('sites', 'App\Http\Controllers\ApiSitesController');

Route::resource('companies', 'App\Http\Controllers\ApiCompaniesController');

Route::resource('about-settings', 'App\Http\Controllers\ApiAboutSettingsController');

Route::resource('featured-settings', 'App\Http\Controllers\ApiFeaturedSettingsController');

Route::resource('general-settings', 'App\Http\Controllers\ApiGeneralSettingsController');

Route::resource('header-settings', 'App\Http\Controllers\ApiHeaderSettingsController');

Route::resource('contact', 'App\Http\Controllers\ContactController');
