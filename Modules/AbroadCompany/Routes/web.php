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
Route::group(['prefix'=>'abroadcompany', 'middleware'=>['auth']],function(){
    Route::get('/', 'AbroadCompanyController@index')->name('Abroad Company');
    Route::get('/add-abroad-company','AbroadCompanyController@addAbroadCompany')->name('Add Abroad Company Form');
    Route::get('/save-abroad-company','AbroadCompanyController@createAbroadCompany');
    Route::get('/edit-abroadcompany/{company_id}','AbroadCompanyController@editAbroadCompany')->name('Edit Abroad Company');
    Route::get('/update-abroad-company/{company_id}','AbroadCompanyController@updateAbroadCompany');
    Route::get('/trash','AbroadCompanyController@showTrash')->name('Abroad Companies Trash');
    Route::get('/trash-abroad-company','AbroadCompanyController@deleteAbroadCompany');
    Route::get('/restore-abroadcompany/{company_id}','AbroadCompanyController@restoreDeletedAbroadCompany');
    Route::get('/remove-abroad-company','AbroadCompanyController@deleteAbroadCompanyPermanently');
});
