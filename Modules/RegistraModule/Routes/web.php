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
Route::group(['prefix'=>'registramodule', 'middleware'=>['auth']],function(){
    Route::get('/', 'RegistraModuleController@index')->name('All  Workers');
    Route::get('/fully-register-domestic-worker/{dw_id}','RegistraModuleController@registerDwForm')->name('Register Worker');
    Route::get('/save-dw-info/{dw_id}','RegistraModuleController@createDwAtRegistra');
    Route::get('/edit-dw-info/{dw_id}','RegistraModuleController@editDwAtRegistra')->name('Edit Worker');
    Route::get('/update-dw-info/{dw_id}','RegistraModuleController@updateDomesticWorkerInfo');
    Route::get('/trash','RegistraModuleController@deleteDwRecieptionLevel');
    Route::get('/restore-dw-data/{dw_id}','RegistraModuleController@restoreDeletedDw');
    Route::get('/trashed-members','RegistraModuleController@showTrash')->name('Trash Workers');
    Route::get('/remove-from-trash','RegistraModuleController@parmanetlyDeleteDW');
    Route::get('/new-domestic-workers','RegistraModuleController@getNewDomesticWorkers')->name('Registered Workers');
    Route::get('/profile','RegistraModuleController@getRegistraProfile')->name('Profile');
    Route::get('/domestic-workers-without-registration','RegistraModuleController@getPendingDomesticWorkers')->name('Pending Workers');
    Route::get('/search-dw','RegistraModuleController@searchDW')->name('Searched DW');
    Route::get('/search-dw_last_name','SearchController@searchAllDW')->name('Searched Worker');
    Route::get('/search-dw_name','SearchController@searchPendingDW')->name('Searched Worker');
    Route::get('/search-trashed_dw','SearchController@searchTrashedDW')->name('Searched Worker');
    Route::get('/view-dw-info/{dw_id}','RegistraModuleController@viewMoreOnDw')->name('Workers Information');
    Route::get('/print-workers','RegistraModuleController@printWorkers')->name('Print Workers Registered');
    Route::get('/print-workers-receipt/{dw_id}','RegistraModuleController@printReceipt')->name('Print Workers Receipt');
});
