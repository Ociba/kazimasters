<?php

namespace Modules\TrainingModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\TrainingModule\Entities\Training;
use Modules\PassportModule\Entities\Passport;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function searchDW()
    {
        if(Passport::where('dw_nin', request()->dw_nin)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Domestic worker with this NIN does not Exist, Please check the Spelling');
        }
        $get_dw_for_training =DB::table('passports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
        ->join('users','users.id','passports.created_by')
        ->where('passports.dw_nin',request()->dw_nin)
        ->select('domestic_worker_at_recieptions.*','passports.*','users.name')
        ->simplePaginate();
        return view('trainingmodule::index', compact('get_dw_for_training'));
    }
   /** 
    * This function searches successful dw
   */
  public function searchSuccessfulDW()
  {
      if(Training::where('visa_number', request()->visa_number)->doesntExist())
      {
          return Redirect()->back()->withInput()->withErrors('Domestic worker with this NIN does not Exist, Please check the Spelling');
      }
      $get_dw_for_with_training =DB::table('trainings')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
        ->join('users','users.id','trainings.created_by')
        ->where('trainings.deleted_at',null)
        ->where('trainings.visa_number', request()->visa_number)
        ->select('users.name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','trainings.*')
        ->simplePaginate(10);
        return view('trainingmodule::with_training', compact('get_dw_for_with_training'));
  }
   /** 
    * This function searches for domestic workers without training details
   */
  protected function searchPendingDw(){
    if(Passport::where('dw_nin', request()->dw_nin)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('Domestic worker with this NIN does not Exist, Please check the Spelling');
    }
    $get_dw_for_without_training =DB::table('passports')
    ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
    ->join('users','users.id','passports.created_by')    
    ->where('passports.dw_nin',request()->dw_nin)
    ->select('users.name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','domestic_worker_at_recieptions.dw_contact',
    'domestic_worker_at_recieptions.nok_contact','passports.*')
    ->simplePaginate(10);
    return view('trainingmodule::without_training', compact('get_dw_for_without_training'));
  }
   /** 
    * This function searches successful dw
   */
  public function searchTrashedDW()
  {
      if(Training::where('visa_number', request()->visa_number)->doesntExist())
      {
          return Redirect()->back()->withInput()->withErrors('Domestic worker with this NIN does not Exist, Please check the Spelling');
      }
      $trashed_dw = Training::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
      ->where('trainings.visa_number', request()->visa_number)
      ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','domestic_worker_at_recieptions.dw_contact',
      'domestic_worker_at_recieptions.nok_contact','trainings.*')->onlyTrashed()->simplePaginate(10);
      return view('trainingmodule::trashed_dw',compact('trashed_dw'));
  }
}
