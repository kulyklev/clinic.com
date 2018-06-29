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

////Route::group(['auth'], function () {
    Route::resource('patient', 'PatientsController');
/*
    Route::resource('bloodTransfusions', 'BloodTransfusionsController');

    Route::resource('finalDiagnosis', 'FinalDiagnosisController');

    Route::resource('periodicHealthExaminations', 'PeriodicHealthExaminationController');

    Route::resource('patients.vaccination', 'VaccinationDataController');

    Route::resource('hospitalizationData', 'HospitalizationDataController');

    Route::resource('termsOfTemporaryDisability', 'TermsOfTemporaryDisabilityController');

    Route::resource('diaries', 'DiaryRecordsController');

    Route::resource('annualEpicrisis', 'AnnualEpicrisisController');

    Route::resource('listsOfInfectiousDiseases', 'ListOfInfectiousDiseasesController');

    Route::resource('listsOfSurgicalInterventions', 'ListOfSurgicalInterventionsController');

    Route::resource('allergicHistories', 'AllergicHistoryController');

    Route::resource('drugIntolerance', 'DrugIntoleranceController');
//});
*/



//
//
//
Route::resource('patient.bloodTransfusions', 'BloodTransfusionsController');

Route::resource('patient.finalDiagnosis', 'FinalDiagnosisController');

Route::resource('patient.periodicHealthExaminations', 'PeriodicHealthExaminationController');

Route::resource('patient.vaccination', 'VaccinationController');

Route::resource('patient.hospitalizationData', 'HospitalizationDataController');

Route::resource('patient.termsOfTemporaryDisability', 'TermsOfTemporaryDisabilityController');

Route::resource('patient.diaries', 'DiaryRecordsController');

Route::resource('patient.annualEpicrisis', 'EpicrisisAnnualController');

Route::resource('patient.infectiousDiseases', 'InfectiousDiseasesController');

Route::resource('patient.surgicalInterventions', 'SurgicalInterventionsController');

Route::resource('patient.allergicHistories', 'AllergicHistoryController');

Route::resource('patient.drugIntolerance', 'DrugIntoleranceController');
//
//
//


Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::post('/patient/setUserId', 'PatientsController@setUserId');

Route::post('/patient/searchPatient', 'PatientsController@searchPatient');

