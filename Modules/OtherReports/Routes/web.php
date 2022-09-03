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

Route::group(['prefix'=>'otherreports', 'middleware'=>['auth']],function(){
    Route::get('/all-domestic-workers', 'OtherReportsController@index')->name('All Workers');
    Route::get('/domestic-workers-pending-documents', 'OtherReportsController@getPendingDwDocuments')->name('Worker Pending Document');
    Route::get('/domestic-workers-visa-payment', 'OtherReportsController@visaPayment')->name('Worker With Visa Payment');
    Route::get('/pcs-test', 'OtherReportsController@pcsTestDw')->name('Worker with PCS Test');
    Route::get('/trash', 'OtherReportsController@showTrash')->name('Other Reports Trash');
    Route::get('/successful-dw', 'OtherReportsController@successfulDW')->name('Cleared Other Reports');
    Route::get('/clearance-form/{dw_id}', 'OtherReportsController@clearDwForm')->name('Other Reports Clearance Form');
    Route::get('/restore-dw/{dw_id}', 'OtherReportsController@restoreDeletedDw');
    Route::get('/edit-dw-info/{dw_id}', 'OtherReportsController@editDwAtOtherReports')->name('Edit Worker Info');
    Route::post('/update-dw-info/{dw_id}','OtherReportsController@updateDomesticWorkerInfo');
    Route::post('/save-other-report/{dw_id}','OtherReportsController@recordDWOtherReportsDetails');
    Route::get('/trash-from-successful','OtherReportsController@deleteDwOtherReportsLevel');
    Route::get('/remove-from-trash','OtherReportsController@parmanetlyDeleteDW');
    Route::get('/search-dw-lastname','SearchController@searchDw')->name('Searched Worker');
    Route::get('/search-successful-dw','SearchController@searchSuccessfulDw')->name('Searched Worker');
    Route::get('/search-pending-dw','SearchController@searchPendingDW')->name('Searched Worker');
    Route::get('/search-trashed-dw','SearchController@searchTrashedDW')->name('Searched Worker');
    Route::get('/print-worker-with-cleared-documents','OtherReportsController@printOtherReports')->name('Print Cleared Other Documents Workers');
    Route::get('/view-more-info/{dw_id}', 'OtherReportsController@moreWorkersInformation')->name('Workers Information');
   
});
