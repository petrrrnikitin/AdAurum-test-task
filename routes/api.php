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

Route::middleware('auth')->group(function ()
{
    Route::get('/company', 'CompanyController@index');
    Route::post('/company', 'CompanyController@store');
    Route::get('/company/{company}', 'CompanyController@show');
    Route::patch('/company/{company}', 'CompanyController@update');


    Route::get('/comments', 'CommentController@index');
    Route::post('/comments', 'CommentController@store');


});



