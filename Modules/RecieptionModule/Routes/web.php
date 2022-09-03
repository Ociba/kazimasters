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
Route::group(['prefix'=>'recieptionmodule', 'middleware'=>['auth']],function(){
    Route::get('/', 'RecieptionModuleController@index')->name('Reception Dashboard');
    Route::get('/register-new-domestic-worker','RecieptionModuleController@registerNewDomesticWorker')->name('Register New Worker');
    Route::post('/save-domestic-worker','RecieptionModuleController@saveDwInfo');
    Route::get('/edit-dw-form/{dw_id}','RecieptionModuleController@editUserDataForm')->name('Update Data');
    Route::get('/update-user-data/{dw_id}','RecieptionModuleController@updateUserData');
    Route::get('/trash-dw-data','RecieptionModuleController@softDeleteDomesticWorker');
    Route::get('/restore-dw-from-trash/{dw_id}','RecieptionModuleController@restoreDeletedDw');
    Route::get('/trash','RecieptionModuleController@getTrashedDws')->name('Trashed Workers');
    Route::get('/delete-from-trash','RecieptionModuleController@deleteDwParmanently');
    Route::get('/all-domestic-workers','RecieptionModuleController@getAllDomesticWorkers')->name('All Workers Registered At Reception');
    Route::get('/new-domestic-workers','RecieptionModuleController@newDomesticWorkers')->name('Todays Registered Workers At Reception');
    Route::get('/profile','RecieptionModuleController@getUserProfile')->name('User Profile');
    Route::get('/search-dw','SearchController@searchDW')->name('Searched Dw');
    Route::get('/view-more-dw-info/{dw_id}','RecieptionModuleController@viewMoreInfo')->name('More Workers Information');
    Route::get('/view-print-page','RecieptionModuleController@viewPageToPrint')->name('Print Workers');

});
