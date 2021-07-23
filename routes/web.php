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

Route::get('/', function () {
    //return view('welcome');
    return redirect('enterpriseIndex');
});

Route::get('enterpriseIndex', 'EnterpriseController@index');

//Route::get('enterprise-create', 'EnterpriseController@create')->name('enterprise');

Route::post('enterprise/nuevo', 'EnterpriseController@save');

Route::post('person/nuevo', 'PersonController@save');
