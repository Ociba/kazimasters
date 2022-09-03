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
Route::group(['prefix'=>'domesticworkeroverallstatus', 'middleware'=>['auth']],function(){
    Route::get('/', 'DomesticWorkerOverallStatusController@index')->name('Register Employer Worker Details');
    Route::get('/add-details/{dw_id}', 'DomesticWorkerOverallStatusController@addDwEmployerDetails')->name('Register Employer Worker Details Form');
    Route::post('/save-dw-employer-info/{dw_id}', 'DomesticWorkerOverallStatusController@createDwEmployerInfo');
    Route::get('/get-dw-employer', 'DomesticWorkerOverallStatusController@PendingDw')->name('Worker Pending To Travel');
    Route::get('/mark-as-travelled/{dw_id}', 'DomesticWorkerOverallStatusController@markAsTravelled');
    Route::get('/travelled/{company_id}', 'DomesticWorkerOverallStatusController@Travelled')->name('Worker Travelled');
    Route::get('/mark-as-did-not-travel/{dw_id}', 'DomesticWorkerOverallStatusController@markAsDidnotTravelled');
    Route::get('/did-not-travel', 'DomesticWorkerOverallStatusController@DidnotTravelled')->name('Worker Did Not Travel');
    Route::get('/companies', 'DomesticWorkerOverallStatusController@getCompaniesAbroad')->name('Companies Abroad');
    Route::get('/search-dw', 'SearchController@searchDW')->name('Searched Worker');
    Route::get('/search-pending-dw', 'SearchController@searchPendingDw')->name('Searched Worker');
    Route::get('/search-travelled-dw', 'SearchController@travelledDw')->name('Searched Worker');
    Route::get('/mark-as-returned/{dw_id}', 'DomesticWorkerOverallStatusController@markAsReturned');
    Route::get('/returned', 'DomesticWorkerOverallStatusController@DwsReturned')->name('Worker Returned');
    Route::get('/mark-as-renewed/{dw_id}', 'DomesticWorkerOverallStatusController@markAsContractRenewed');
    Route::get('/renewed', 'DomesticWorkerOverallStatusController@DwsRenewedContract')->name('Worker Contract Renewed');
    Route::get('/edit-dw-info/{dw_id}', 'DomesticWorkerOverallStatusController@dwRenewedContractDetails')->name('Edit Worker Contract Renewed');
    Route::get('/save-new-renewed-contract/{dw_id}', 'DomesticWorkerOverallStatusController@updateDomesticWorkerInfo');
    Route::get('/print-workers-employer-info', 'DomesticWorkerOverallStatusController@printWorkersReadyToTravel');
    Route::get('/all-workers-information', 'AllWorkersInfoController@allWorkersInformation')->name('Workers');
    Route::get('/view-details/{workers_id}', 'AllWorkersInfoController@viewallWorkersInformation')->name('All Workers Information');
});
