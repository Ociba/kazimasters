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
Route::group(['prefix'=>'joborder', 'middleware'=>['auth']],function(){
    Route::get('/', 'JobOrderController@index')->name('Abroad Companies');
    Route::get('/trash', 'JobOrderController@showTrash')->name('Trashed Job Orders');
    Route::get('/get-job-order-form/{company_id}', 'JobOrderController@jobOrderForm')->name('Job Order Form');
    Route::get('/save-job-order', 'JobOrderController@createJobOrder');
    Route::get('/edit-job-order/{order_id}', 'JobOrderController@editJobOrder');
    Route::get('/update-job-order/{order_id}', 'JobOrderController@updateJobAbroad');
    Route::get('/trash-job-order', 'JobOrderController@deleteJobOrder');
    Route::get('/restore-job-order/{order_id}', 'JobOrderController@restoreDeletedJobOrder');
    Route::get('/remove-job-order-from-trash', 'JobOrderController@deletJobOrderPermanently');
    Route::get('/company-job-orders/{company_id}','JobOrderController@jobOrders')->name('Job Orders');
    Route::get('/proof-of-payment/{order_id}','JobOrderController@attachProofOfPayment')->name('Attach Proof Of Payment');
    Route::post('/attach-proof-of-payment/{order_id}','JobOrderController@attachPaymentProof');
    Route::get('/print-job-orders/{company_id}','JobOrderController@printJobOrders')->name('Print Job Orders');
});
