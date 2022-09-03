<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CVController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Models\SaudiCompany;

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

Route::get('/', function () {
    return view('auth.login');
});
Route::middleware(['auth'])->group(function () { 
    Route::get('/dashboard',[DashboardController::Class,'getDashboard'])->name('Dashboard');

    Route::get('get-users',[PermissionsController::Class, 'getUsers'])->name('Users');
    Route::get('/user-and-permissions/{user_id}',[PermissionsController::Class, 'getUserAndPermission'])->name('User And Permissions');
    Route::get('/unassign-permission/{id}',[PermissionsController::Class, 'removePermissionFromUser']);
    Route::get('/add-permissions/{user_id}',[PermissionsController::Class, 'getPermissions'])->name('Permissions');
    Route::get('/assign-permissions/{user_id}',[PermissionsController::Class, 'assignPermission']);


    Route::get('/profile',[ProfileController::Class,'getUserProfile'])->name('My Profile');
    Route::post('/upload-photo',[ProfileController::Class,'uploadProfilePhoto']);
    Route::get('/update-password',[ProfileController::Class, 'updateUserPassword']);
    Route::get('/change-email',[ProfileController::Class, 'updateUserEmail']);

    Route::get('/logout',[AuthenticationController::Class, 'logoutUser']);
    Route::get('/register-user',[AuthenticationController::Class,'getRegistrationForm'])->name('Register Users');
    Route::get('/registered-users',[AuthenticationController::Class, 'getRegisteredUsers'])->name('Registered Users');
    Route::get('/delete',[AuthenticationController::Class,'parmanetlyDeleteUser']);
});

Route::group(['prefix'=>'cv', 'middleware'=>['auth']],function(){
    Route::get('/all-dws',[CVController::Class, 'allDomesticWokers'])->name('All Domestic Workers');
    Route::get('/domestic-workers-with-CV',[CVController::Class, 'getAllDomesticWorkersWithCVs'])->name('Domestic Workers With Cv');
    Route::get('/domestic-workers-without-CV', [CVController::Class, 'getAllDomesticWorkersWithOutCv'])->name('Domestic Workers Without CV');
    Route::get('/trash',[CVController::Class, 'getAllTrashedDomesticWorkers'])->name('Trashed Domestic Workers');
    Route::get('/attach-cv-and-passport/{dw_id}',[CVController::Class,'attachDwCVAndPassport'])->name('Attach DW CV and Passport');
    Route::get('/search-dw-nin',[CVController::Class, 'searchDomesticWorker'])->name('Searched DW');
});

Route::post('/reigister-now',[AuthenticationController::Class,'createUser']);
Route::get('/register', function (){return redirect('/login');});
Route::get('/search-user',[AuthenticationController::Class,'searchUserForPermission']);
Route::get('/search-users',[AuthenticationController::Class,'searchUser']);

//Job orders routes
Route::get('/get-saudi-company', function () {
    $companies = SaudiCompany::paginate(10);    
    return view('saudi_company',compact('companies'));
});
Route::get('/add-saudi-company', function () {return view('saudi_company_form');});
Route::get('/orders', function () {return view('orders');});
Route::get('/add-order', function () {return view('order_form');});
Route::get('/create-company',function(){
    $company_name = new SaudiCompany;
    $company_name->comp_name = request()->company_name;
    $company_name->created_by = auth()->user()->id;
    $company_name->save();
    return redirect()->back()->with('msg','operation successful');
})->middleware('auth');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware(['guest'])->name('password.reset');

Route::post('/forget-password', 'ForgotPasswordController@postEmail');


