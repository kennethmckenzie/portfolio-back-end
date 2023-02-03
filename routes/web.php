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
    return 'Headless CMS and API for <a href="https://kennethmckenzie.co.uk">kennethmckenzie.co.uk</a><br><a href="https://api.kennethmckenzie.co.uk/public/login"> Login </a>';
});

Route::get('/register', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('skills', 'App\Http\Controllers\SkillsController');

Route::resource('sites', 'App\Http\Controllers\SitesController');

Route::resource('companies', 'App\Http\Controllers\CompaniesController');

Route::resource('about-settings', 'App\Http\Controllers\AboutSettingsController');

Route::resource('featured-settings', 'App\Http\Controllers\FeaturedSettingsController');

Route::resource('general-settings', 'App\Http\Controllers\GeneralSettingsController');

Route::resource('header-settings', 'App\Http\Controllers\HeaderSettingsController');
