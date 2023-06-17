<?php

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

/*:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
::::::::::::::::::::::::::: Dashboard Routes :::::::::::::::::::::::::::::::::::
:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
Route::group(['prefix' => 'v1/dashboard', 'namespace'  => 'App\Http\Controllers\Api\Dashboard'], function() {


    //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    //:::::::::::::::::::::::::::::: Auth Routes ::::::::::::::::::::::::::::::::
    //:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    Route::group(['prefix' => 'auth', 'namespace'  => 'Auth'], function() {

        // Login Api
        Route::post('login', "LoginController")->middleware('throttle:5,1');



    });
    /*:::: company ::::*/
    Route::group(['prefix' => 'company', 'namespace' => 'Company'], function () {
        //:::: create company ::::
        Route::post('create', "CompanyController@create");
        //:::: retrieve company ::::
        Route::post('/details', "CompanyController@show");
        //:::: retrieve all company ::::
        Route::get('all', "CompanyController@index");
        //:::: delete company ::::
        Route::post('delete', "CompanyController@destroy");

    });

    /*:::: employee ::::*/
    Route::group(['prefix' => 'employee', 'namespace' => 'Employee'], function () {
        //:::: create employee ::::
        Route::post("create","EmployeeController@create");
        //:::: retrieve all employee ::::
        Route::get("all","EmployeeController@index");
        //:::: retrieve employee ::::
        Route::post("details","EmployeeController@show");
        //:::: delete employee ::::
        Route::post("delete","EmployeeController@destroy");
    });

    /*:::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
    :::::::::::::::::::: Routes Need To Be Authenticated ::::::::::::::::::::::::
    :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/
    Route::group(['middleware' => ['auth:api','AdminType']], function (){

        /*:::: user ::::*/
        Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {
            //:::: create user ::::
            Route::post("create","UserController@create");
            //:::: retrieve all user ::::
            Route::get("all","UserController@index");
            //:::: retrieve user ::::
            Route::post("details","UserController@show");
            //:::: delete user ::::
            Route::post("delete","UserController@destroy");
        });


    });


});



