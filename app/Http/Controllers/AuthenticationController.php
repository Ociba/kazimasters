<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use DB;
use App\Models\User;

class AuthenticationController extends Controller
{
    /** 
     * This function logsout user and redirects to welcome page
    */
    protected function logoutUser(){
        Auth::logout();
        return redirect('/');
    }
    /** 
     * This function gets users registration form
    */
    protected function getRegistrationForm(){
        return view('admin.registration_form');
    }
    /** 
     * This function registers User
    */
    public function createUser(){
        if(User::where('email',request()->email)->exists()){
            return redirect()->back()->withErrors('This email is already taken');
        }elseif(request()->password == request()->password_confirmation){
            return $this->registerUser();
        }else{
            return redirect()->back()->withErrors('Make sure the two passwords match');
        }
    }
    private function registerUser(){
        $register_user =new User;
        $register_user ->name =request()->name;
        $register_user ->email =request()->email;
        $register_user ->password =Hash::make(request()->password);
        $register_user ->created_by=auth()->user()->id;
        $register_user ->save();
        return redirect()->back()->with('msg', 'Operation Successful');
    }
    protected function getRegisteredUsers(){
        $get_registered_users =DB::table('users')->orderBy('created_at','Desc')->simplePaginate(10);
        return view('admin.users', compact('get_registered_users'));
    }
    /**
     * this function deletes the user
     */
    protected function parmanetlyDeleteUser(){
        $user_id = request()->delete_user;
        User::where('id',$user_id)->ForceDelete();
        //return to previous route
        return redirect()->back()->with('msg','Operation Successful');
    }
    /** 
     * This function searches users for permissions
    */
    protected function searchUserForPermission()
    {
    if(User::where('name', request()->name)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('User name does not Exist');
    }
        $get_registered_users =DB::table('users')
        ->where('name', request()->name)->simplePaginate(10);
        return view('admin.users', compact('get_registered_users'));
    }
    /** 
     * This function searches users in user table
    */
    protected function searchUser()
    {
    if(User::where('name', request()->name)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('User name does not Exist');
    }
        $get_registered_users =DB::table('users')
        ->where('name', request()->name)->simplePaginate(10);
        return view('admin.users', compact('get_registered_users'));
    }
}
