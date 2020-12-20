<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

 
//Route::resource('admitions', 'AdmitionsController');
//setting
Route::resource('services', 'ServicesController');
Route::resource('sections', 'SectionController');
Route::resource('insurance', 'InsurancesController');
Route::resource('cominsurance', 'ComInsurancesController');


Route::resource('people', 'PeoplesController');
 Route::get('people/addservice/{person_id}/{service_id}', 'PeoplesController@AddServiceToPerson')->name('patient.addservice');


Route::resource('personservices', 'PersonServiceController');
Route::resource('personservices', 'PersonServiceController');
Route::post('services/ajax', 'ServicesController@GetServiceName')->name('autocomplete.fetch');

Route::post('sectionpatient/{section}', 'ServicesController@GetServiceName')->name('sectionpatient.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
