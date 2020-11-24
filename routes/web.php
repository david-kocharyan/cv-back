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

//Admin dashboard part
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::resource('/', 'AdminController');

    Route::resource('users' , "UserController");
    Route::resource('skills', "SkillController");
    Route::resource('works' , "WorkController");
    Route::resource('educations' , "EducationController");
    Route::resource('portfolio' , "PortfolioController");
    Route::get('portfolio/images/{id}', 'PortfolioController@getImages');
    Route::post('portfolio/images/{id}/create', 'PortfolioController@createImages');
    Route::delete('portfolio/images/{id}/delete/{image_id}', 'PortfolioController@deleteImage');
});

