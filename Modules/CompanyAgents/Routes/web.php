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
Route::group(['prefix'=>'companyagents', 'middleware'=>['auth']],function(){
    Route::get('/company-agents', 'CompanyAgentsController@index')->name('Company Agents');
    Route::get('/trashed-agents', 'CompanyAgentsController@showTrash')->name('Trashed Company Agents');
    Route::get('/register-company-agents', 'CompanyAgentsController@registerCompanyAgentForm')->name('Agent Registration Form');
    Route::get('/save-company-agents', 'CompanyAgentsController@recordAgentCompanyAgentDetails');
    Route::get('/edit-company-agent/{agent_id}', 'CompanyAgentsController@editCompanyAgent')->name('Edit Company Agents Form');
    Route::get('/update-company-agent/{agent_id}', 'CompanyAgentsController@updateDomesticWorkerInfo');
    Route::get('/trash', 'CompanyAgentsController@deleteCompanyAgentCompanyAgentLevel');
    Route::get('/restore-company-agent/{agent_id}', 'CompanyAgentsController@restoreDeletedCompanyAgent');
    Route::get('/remove-from-trash', 'CompanyAgentsController@parmanetlyDeleteAgent');
    Route::get('/view-dws/{agent_id}','CompanyAgentsController@CompanyAgentDw')->name('Workers For This Agent');
    Route::get('/search-agent','SearchController@searchDw')->name('Searched Agent');
    Route::get('/search-trashed-agent','SearchController@searchTrashedAgent')->name('Searched Agent');
    Route::get('/print-company-agents', 'CompanyAgentsController@printAgentDetails')->name('Print Company Agents');
});
