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
    return view('welcome');
});

Route::resource('patients', 'PatientsController');

//TODO Routes below are not working
/*Route::post('bloodTransfusions}', 'BloodTransfusionsController@store');
Route::get('bloodTransfusions/create/{patientID}', 'BloodTransfusionsController@create');
Route::put('bloodTransfusions/{patientID}', 'BloodTransfusionsController@update');
Route::get('bloodTransfusions/{patientID}', 'BloodTransfusionsController@show');
Route::delete('bloodTransfusions/{patientID}', 'BloodTransfusionsController@destroy');
Route::get('bloodTransfusions/{patientID}/edit', 'BloodTransfusionsController@edit');
*/

Route::resource('bloodTransfusions', 'BloodTransfusionsController');