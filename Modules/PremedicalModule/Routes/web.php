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
Route::group(['prefix'=>'premedicalmodule', 'middleware'=>['auth']],function(){
    Route::get('/', 'PremedicalModuleController@index')->name('Workers Premedical Results ');
    Route::get('/all-domestic-workers','PremedicalModuleController@getAllDomesticWorkers')->name('All Workers');
    Route::get('/domestic-workers-with-premedical','PremedicalModuleController@getDomesticWorkersWithPremedical')->name('Workers With Premedical');
    Route::get('/domestic-workers-without-premedical','PremedicalModuleController@getDomesticWorkersWithoutPremedical')->name('Workers Without Premedical');
    Route::get('/trash','PremedicalModuleController@showTrash')->name('Trash');
    Route::get('/register-domestic-worker-premedical/{dw_id}','PremedicalModuleController@registerDwForm')->name('Premedical Results');
    Route::post('/record-dw-premedical-info/{dw_id}','PremedicalModuleController@recordDWDomesticWorkerAtPreMedicalDetails');
    Route::get('/edit-dw-premedical-info/{dw_id}','PremedicalModuleController@editDwAtDomesticWorkerAtPreMedical')->name('Edit Workers Premedical Results');
    Route::get('/update-dw-at-premedical/{dw_id}','PremedicalModuleController@updateDomesticWorkerInfo');
    Route::get('/trash-domestic-worker','PremedicalModuleController@deleteDwDomesticWorkerAtPreMedicalLevel');
    Route::get('/permanently-delete-dw','PremedicalModuleController@parmanetlyDeleteDW');
    Route::get('/restore-deleted-dw/{dw_id}','PremedicalModuleController@restoreDeletedDw');
    Route::get('/get-medical-test-form/{dw_id}','PremedicalModuleController@getMedicalTestForm')->name('Medical Test Form');
    Route::get('/search-dw','SearchController@searchDW')->name('Searched Worker');
    Route::get('/search-dw_info','SearchController@searchPendingDW')->name('Searched Worker');
    Route::get('/search-dw_last_name','SearchController@searchSuccessfulDW')->name('Searched Worker');
    Route::get('/search-trashed_dw','SearchController@searchTrashedDW')->name('Searched Worker');
    Route::get('/view-print-page','PremedicalModuleController@PrintPremedical')->name('Print Premedical');
});
