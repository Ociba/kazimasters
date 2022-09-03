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
Route::group(['prefix'=>'passportmodule', 'middleware'=>['auth']],function(){
    Route::get('/', 'PassportModuleController@index')->name('All Workers');
    Route::get('/fully-register-domestic-worker/{dw_id}','PassportModuleController@registerDwForm')->name('Register Worker');
    Route::post('/save-dw-info/{dw_id}','PassportModuleController@recordDWPassportDetails');
    Route::get('/edit-dw-info/{dw_id}','PassportModuleController@editDwAtPassport')->name('Edit Worker');
    Route::get('/update-dw-info/{dw_id}','PassportModuleController@updateDomesticWorkerInfo');
    Route::get('/trash','PassportModuleController@deleteDwPassportLevel');
    Route::get('/restore-dw-data/{dw_id}','PassportModuleController@restoreDeletedDw');
    Route::get('/trashed-members','PassportModuleController@showTrash')->name('Trash Workers');
    Route::get('/remove-from-trash','PassportModuleController@parmanetlyDeleteDW');
    Route::get('/domestic-workers-with-passport','PassportModuleController@getDomesticWorkersWithPassport')->name('Workers With Passports');
    Route::get('/domestic-workers-without-passport','PassportModuleController@getDomesticWorkersWithOutPassport')->name('Workers Without Passport');
    Route::get('/search-dw','SearchController@searchDW')->name('Searched DW');
    Route::get('/search-dw-info','SearchController@searchPendingDW')->name('Searched Worker');
    Route::get('/search-dw-nin','SearchController@searchSuccessfulDW')->name('Searched Worker');
    Route::get('/search-trashed_dw','SearchController@searchTrashedDW')->name('Searched Worker');

    Route::get('/dws-to-process-passport','ProcessPassportController@processDwPassport')->name('Workers To Process Passport');
    Route::get('/get-dw-info/{dw_id}','ProcessPassportController@registerDwForm')->name('Workers Passport Info');
    Route::get('/save-dw-passport-info/{dw_id}','ProcessPassportController@processPassport');
    Route::get('/dws-passports-under-processing','ProcessPassportController@showDwPassportsUnderProcessing')->name('Workers Passports Under Processing');
    Route::get('/mark-as-received/{dw_id}','ProcessPassportController@markDwAtPassport');
    Route::get('/mark-as-not-received/{dw_id}','ProcessPassportController@markDwAtPassportNotReceived');
    Route::get('/received-passports','ProcessPassportController@ReceivedPassports');
    Route::get('/passports-not-received','ProcessPassportController@passportsNotReceived');
    Route::get('/passports-to-be-processed','ProcessPassportController@printPassportsTobeProcessed')->name('Passports To Be Processed');
    Route::get('/view-print-passport-info','PassportModuleController@printPassportsInfo')->name('Passports Print');
    Route::get('/search-date-range-workers','ProcessPassportController@SearchWorkersByDateRange')->name('Workers');
});
