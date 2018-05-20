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
    return view('home');
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

Route::resource('finalDiagnosis', 'FinalDiagnosisController');

Route::resource('periodicHealthExaminations', 'PeriodicHealthExaminationController');

Route::resource('vaccinationData', 'VaccinationDataController');

Route::resource('hospitalizationData', 'HospitalizationDataController');

Route::resource('termsOfTemporaryDisability', 'TermsOfTemporaryDisabilityController');

Route::resource('diaries', 'DiaryController');

Route::resource('annualEpicrisis', 'AnnualEpicrisisController');

Route::resource('listsOfInfectiousDiseases', 'ListOfInfectiousDiseasesController');

Route::resource('listsOfSurgicalInterventions', 'ListOfSurgicalInterventionsController');

Route::resource('allergicHistories', 'AllergicHistoryController');

Route::resource('drugIntolerance', 'DrugIntoleranceController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
