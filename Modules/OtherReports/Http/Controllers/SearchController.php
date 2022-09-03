<?php

namespace Modules\OtherReports\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RecieptionModule\Entities\DomesticWorkerAtRecieption;
use DB;
use Modules\OtherReports\Entities\OtherReport;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function searchDw()
    {
    if(DomesticWorkerAtRecieption::where('dw_contact', request()->dw_contact)->doesntExist())
      {
          return Redirect()->back()->withInput()->withErrors('Worker Contact does not Exist');
      }
      $get_dw =DB::table('trainings')
      ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
      ->join('users','users.id','trainings.created_by')
      ->orderBy('trainings.created_at','Desc')
      ->where('trainings.deleted_at',null)->where('domestic_worker_at_recieptions.dw_contact', request()->dw_contact)
      ->where('trainings.other_reports_status','pending')
      ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
      'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','trainings.*','users.name')
      ->simplePaginate(10);
        return view('otherreports::index', compact('get_dw'));
    }

   /** 
    * This function searches for successful domestic workers
   */
  protected function searchSuccessfulDw(){
    if(DomesticWorkerAtRecieption::where('dw_last_name', request()->dw_last_name)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('Worker with this last name does not Exist');
    }
    $get_cleared_dw =OtherReport::join('domestic_worker_at_recieptions','other_reports.dw_at_other_reports_level_id','domestic_worker_at_recieptions.id')
    ->join('users','users.id','other_reports.created_by')
        ->where('other_reports.deleted_at',null)->where('domestic_worker_at_recieptions.dw_last_name', request()->dw_last_name)
        ->select('users.name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','other_reports.*')
        ->simplePaginate(10);
    return view('otherreports::successful_dw', compact('get_cleared_dw'));
  }
  /** 
   * This function searches for pending domestic worker
  */
  protected function searchPendingDW(){
    if(DomesticWorkerAtRecieption::where('dw_contact', request()->dw_contact)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('Worker with this Contact does not Exist');
    }
    $get_dw =DB::table('trainings')
    ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
    ->join('users','users.id','trainings.created_by')
    ->orderBy('trainings.created_at','Desc')
    ->where('trainings.deleted_at',null)->where('domestic_worker_at_recieptions.dw_contact', request()->dw_contact)
    ->where('trainings.other_reports_status','pending')
    ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
    'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','trainings.*','users.name')
        ->simplePaginate(10);
    return view('otherreports::pending',compact('get_dw'));
  }
  /** 
   * This function searches domestic workers
  */
  protected function searchTrashedDW(){
    if(DomesticWorkerAtRecieption::where('dw_last_name', request()->dw_last_name)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('Worker with this last name does not Exist');
    }
    $trashed_dws = OtherReport::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','other_reports.dw_at_other_reports_level_id')
    ->join('users','users.id','other_reports.created_by')
    ->orderBy('other_reports.updated_at','Desc')
    ->where('other_reports.deleted_at',null)
    ->select('users.name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
    'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','other_reports.*')
    ->onlyTrashed()
    ->where('domestic_worker_at_recieptions.dw_last_name', request()->dw_last_name)
    ->simplePaginate(10);
    return view('otherreports::trashed_dw',compact('trashed_dws'));
  }
}
