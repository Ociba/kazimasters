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
Route::group(['prefix'=>'clearancemodule', 'middleware'=>['auth']],function(){
    Route::get('/', 'ClearanceModuleController@index')->name('Workers For Clearance');
    Route::get('/domestic-workers-cleared','ClearanceModuleController@getClearedDomesticWorkers')->name('Cleared Workers');
    Route::get('/domestic-workers-with-pending-clearance','ClearanceModuleController@getDomesticWorkersWithPendingClearance')->name('Workers Pending Clearance');
    Route::get('/trash','ClearanceModuleController@showTrash')->name('Clearance Workers Trash');
    Route::get('/profile','ClearanceModuleController@userProfile')->name('Clearance DW Profile');
    Route::get('/clearance-form/{dw_id}','ClearanceModuleController@clearDwForm')->name('Clearance Form');
    Route::get('/edit-dw-info/{dw_id}','ClearanceModuleController@editDwAtClearance')->name('Edit Clearance');
    Route::get('/clear-dw/{dw_id}','ClearanceModuleController@recordDWClearanceDetails');
    Route::get('/update-dw-clearance/{dw_id}','ClearanceModuleController@updateDomesticWorkerInfo');
    Route::get('/trash-dw','ClearanceModuleController@deleteDwClearanceLevel');
    Route::get('/restore-trashed-dw/{dw_id}','ClearanceModuleController@restoreDeletedDw');
    Route::get('/remove-from-clearance-trash','ClearanceModuleController@parmanetlyDeleteDW');
    Route::get('/search-dw','SearchController@searchDW')->name('Searched Worker');
    Route::get('/search-dw-lastname','SearchController@searchClearedSuccessfullWorker')->name('Searched Worker');
    Route::get('/search-dw-visa-number','SearchController@searchDWToBeCleared')->name('Searched Worker');
    Route::get('/search-trashed_dw','SearchController@searchTrashedDw')->name('Searched Worker');
    Route::get('/print-cleared-workers','ClearanceModuleController@printClearedWorkers')->name('Cleared Workers');
});
