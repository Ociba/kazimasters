<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use DB;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'category',
        'password',
        'created_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /** 
     * This function gets Users permissions
    */
    public function getUserPermisions(){
        $empty_permissions_array = [];
        $permissions_array = DB::table('user_permissions')
        ->join('permissions','user_permissions.permission_id','permissions.id')
        ->where('user_id',Auth::user()->id)
        ->select('permissions.permission')->get();
        foreach(json_decode($permissions_array,true) as $permissions){
                array_push($empty_permissions_array,$permissions["permission"]);
        }
        return $empty_permissions_array;
    }
    /**
     * This function gets photo for logged in user
     */
    public function getLoggedInUserLogo(){
        $user_logo = DB::table('users')->where('id', '=', $this->id)->value('profile_photo_path');
        if(empty($user_logo)){
            $user_logo = 'kazi.jpg';
        }
        return $user_logo;
    }
    /**
     * this function gets the number of all users
     */
    public function getNumberOfAllUsers(){
        return DB::table('users')->count();
    }

    /**
     * this function gets the domestic workers at recieption
     */
    public function getDomesticWorkersAtRecieption(){
        return DB::table('domestic_worker_at_recieptions')->count();
    }

    /**
     * this function gets the number of domestic workers at registra
     */
    public function getDomesticWorkersAtRegistra(){
        return DB::table('domestic_worker_at_recieptions')->count();
    }
    /** 
     * get the number of passports registered
    */
    public function countPassports(){
        return DB::table('passports')->where('deleted_at',null)->count('passport');
    }
    /** 
     * This function gets domestic workers who travelled
    */
    public function countDwsTravelled(){
        return DB::table('dw_employers')->where('status','travelled')->count();
    }
     /** 
     * This function gets domestic workers who did not travel
    */
    public function countDwsWhoDidNotTravel(){
        return DB::table('dw_employers')->where('status','did not')->count();
    }
      /** 
     * This function gets domestic workers who travelled
    */
    public function countDwReturned(){
        return DB::table('dw_employers')->where('status','returned')->count();
    }
      /** 
     * This function gets domestic workers who renewed Contract
    */
    public function countDwRenewedContract(){
        return DB::table('dw_employers')->where('status','renewed')->count();
    }
}
