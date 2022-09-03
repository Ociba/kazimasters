<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Auth;
use Hash;

class ProfileController extends Controller
{
    /** 
     * This function gets user profile
    */
    protected function getUserProfile(){
        $get_users_info =DB::table('users')->where('id',auth()->user()->id)->get();
        return view('admin.profile.user_profile', compact('get_users_info'));
    }

    /** 
     * This function uploads photo  for user
    */
    protected function uploadProfilePhoto(){
        $user_photo = request()->profile_photo_path;
        $user_photo_original = $user_photo->getClientOriginalName();
        $user_photo->move('user_photo/',$user_photo_original);

        User::where('id',auth()->user()->id)->update(array(
            'profile_photo_path' =>$user_photo_original
        ));
        return redirect()->back()->with('msg','Operation Successfull');
    }
    /** 
     * This function changes user password for current authenticated user
    */
    protected function updateUserPassword(Request $request) {
        $get_users_current_password = User::find(Auth::user()->id)->password;
        $current_password = $request->current_password;
        if ($request->new_password == $request->confirm_password) {
            if (Hash::check($current_password, $get_users_current_password)) {
                User::where("id", Auth::user()->id)->update(array('password' => Hash::make($request->new_password)));
               // Auth::logout();
                return redirect('/logout');
            } else {
                return Redirect()->back()->withInput()->withErrors("Incorrect password has been supplied");
            }
        } else {
            return Redirect()->back()->withInput()->withErrors("Make sure the two new passwords match");
        }
        return redirect()->back()->with('msg','Operation successful');
    }
    /** 
     * This function updates only email
    */
    protected function updateUserEmail(){
        User::where('id',auth()->user()->id)->update(array(
            'email' =>request()->email,
        ));
        return redirect()->back()->with('msg','Operation Successfull');
    }
    }
