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


Route::group(['prefix'=>'trainingmodule', 'middleware'=>['auth']],function(){
    Route::get('/', 'TrainingModuleController@index')->name('All Workers For Training');
    Route::get('/domestic-workers-with-training','TrainingModuleController@domesticWorkersWithTraining')->name('Workers With Training');
    Route::get('/domestic-workers-without-training','TrainingModuleController@domesticWorkersWithoutTraining')->name('Workers Without Training');
    Route::get('/trash','TrainingModuleController@showTrash')->name('Trashed Domestic Workers');
    Route::get('/register-worker/{dw_id}','TrainingModuleController@registerDwTrainingForm')->name('Register Workers');
    Route::post('/save-dw-info/{dw_id}','TrainingModuleController@createDwAtTraining');
    Route::get('/edit-dw-training-info/{dw_id}','TrainingModuleController@editDwAtTraining')->name('Edit Training Info');
    Route::get('/update-dw-info/{dw_id}','TrainingModuleController@updateDomesticWorkerTrainingReport');
    Route::get('/restore-delete_dw/{dw_id}','TrainingModuleController@restoreDeletedDwReport');
    Route::get('/send-to-trash','TrainingModuleController@deleteDwAtTrainingLevel');
    Route::get('/remove-from-trash','TrainingModuleController@parmanetlyDeleteDW');
    Route::get('/search-dw','SearchController@searchDW')->name('Searched DW');
    Route::get('/search-dw-visa-number','SearchController@searchSuccessfulDW')->name('Searched Worker');
    Route::get('/search-pending-dw','SearchController@searchPendingDw')->name('Searched Worker');
    Route::get('/search-trashed-dw','SearchController@searchTrashedDW')->name('Searched Worker');
    Route::get('/print-worker-training-info','TrainingModuleController@printWorkerInfo')->name('Print Training Details');
    Route::get('/training-schools','TrainingSchoolsController@TrainingSchool')->name('Training Schools');
    Route::get('/add-training-school-form','TrainingSchoolsController@addTrainingSchool')->name('Register Training School');
    Route::get('/save-training-school-info','TrainingSchoolsController@createTrainingSchool');
    Route::get('/workers-for-training-schools','TrainingSchoolsController@workersToAllocateTrainingSchs')->name('Workers');
    Route::get('/allocate-training-school/{dw_id}','TrainingSchoolsController@registerWorkersToTrainigSchool')->name('Allocate School');
    Route::get('/save-training-school-allocated/{dw_id}','TrainingSchoolsController@createTrainingSchoolInfo');
    Route::get('/workers-and-training-schools','TrainingSchoolsController@WorkersAndTrainingSchool')->name('Training School');
    Route::get('/view-workers/{id}','TrainingSchoolsController@allWorkersAllocated')->name('Training School Workers');
    Route::get('/print-workers/{id}','TrainingSchoolsController@printAllWorkersAllocated')->name('Print Workers For This Training School');
    Route::get('/mark-as-sent/{id}','TrainingSchoolsController@markAsSentForTraining');
});
