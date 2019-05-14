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

/** visitors are allow */

Route::group(['middleware' => ['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    /** Authorised Users are allow */
    Route::group(['middleware' => ['auth']], function () {

        Route::get('/dashboard', 'Client\DashboardController@index')->name('dashboard');

        Route::resources([
            'projects' => 'Client\ProjectController'
        ]);

        /** Client Admin Panel Users are allow */
        Route::group(['middleware' => ['clientadmin'] ], function () {

            Route::resources([
                'users' => 'Client\UserController'
            ]);
        });

        /** Only BullScript Users are allow */
        Route::group(['middleware' => ['superadmin'], 'prefix' => '/admin' ], function () {

            Route::resources([
                'clients' => 'Admin\ClientController',
            ]);
        });
    });
});

Route::get('/home', 'HomeController@index')->name('home');
