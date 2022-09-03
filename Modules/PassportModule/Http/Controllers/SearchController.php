<?php

namespace Modules\PassportModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\PremedicalModule\Entities\DomesticWorkerAtPreMedical;
use Modules\RecieptionModule\Entities\DomesticWorkerAtRecieption;
use DB;
use Modules\PassportModule\Entities\Passport;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function searchDW()
    {
        if(DomesticWorkerAtRecieption::where('dw_contact', request()->dw_contact)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Domestic worker Contact does not Exist');
        }
        $get_dw_passport_info=DB::table('domestic_worker_at_registras')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->join('users','users.id','domestic_worker_at_registras.user_id')
        ->where('domestic_worker_at_registras.passport_status','pending')
        ->where('domestic_worker_at_recieptions.dw_contact',request()->dw_contact)
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*',"domestic_worker_at_registras.created_at",'users.name')
        ->simplePaginate(10);
        return view('passportmodule::index', compact('get_dw_passport_info'));
    }

  /**
   * This function searches successfull dw for passport
   */
  protected function searchSuccessfulDW(){
    if(Passport::where('dw_nin', request()->dw_nin)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('Domestic worker with this NIN does not Exist');
    }
    $with_passport = DB::table('passports')
    ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
    ->join('users','users.id','passports.created_by')
    ->where('passports.deleted_at',null)->orderBy('passports.created_at','Desc')
    ->where('passports.dw_nin',request()->dw_nin)
    ->select('passports.*','domestic_worker_at_recieptions.*','passports.created_at','users.name')->simplePaginate(10);
    return view('passportmodule::domestic_workers_with_passport',compact('with_passport'));
  }
  /** 
   * This function searches for pending dw
  */
  protected function searchPendingDW(){
    if(DomesticWorkerAtRecieption::where('dw_contact', request()->dw_contact)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('Domestic worker Contact does not Exist');
    }
    $with_out_passport =DB::table('domestic_worker_at_registras')
    ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
    ->join('users','users.id','domestic_worker_at_registras.user_id')
    ->where('domestic_worker_at_registras.passport_status','pending')
    ->where('domestic_worker_at_recieptions.dw_contact',request()->dw_contact)
    ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*',"domestic_worker_at_registras.created_at",'users.name')
    ->simplePaginate(10);
    return view('passportmodule::domestic_workers_without_passport',compact('with_out_passport'));
  }
}
