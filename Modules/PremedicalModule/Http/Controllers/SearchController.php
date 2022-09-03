<?php

namespace Modules\PremedicalModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RegistraModule\Entities\DomesticWorkerAtRegistra;
use Modules\PremedicalModule\Entities\DomesticWorkerAtPreMedical;
use Modules\RecieptionModule\Entities\DomesticWorkerAtRecieption;
use DB;

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
        $all_domestic_workers=DB::table('domestic_worker_at_recieptions')
        ->join('users','users.id','domestic_worker_at_recieptions.created_by')
        ->join('company_agents','company_agents.id','domestic_worker_at_recieptions.agent_id')
        ->where('domestic_worker_at_recieptions.deleted_at',null)
        ->orderBy('domestic_worker_at_recieptions.created_at','Desc')
        ->select('users.name','domestic_worker_at_recieptions.*','company_agents.phone_number')
        ->where('domestic_worker_at_recieptions.dw_contact',request()->dw_contact)->simplePaginate(10);
        return view('premedicalmodule::index',compact('all_domestic_workers'));
    }
/** 
 * This function searches for the pending dw workers
*/
protected function searchPendingDW(){
    if(DomesticWorkerAtRecieption::where('dw_contact', request()->dw_contact)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Domestic workerContact does not Exist');
        }
    $all_domestic_workers = DB::table('domestic_worker_at_recieptions')
    ->join('users','users.id','domestic_worker_at_recieptions.created_by')
    ->join('company_agents','company_agents.id','domestic_worker_at_recieptions.agent_id')
    ->where('domestic_worker_at_recieptions.deleted_at',null)
    ->orderBy('domestic_worker_at_recieptions.created_at','Desc')->where('domestic_worker_at_recieptions.premedical_status','pending')
    ->where('domestic_worker_at_recieptions.dw_contact',request()->dw_contact)
    ->select('users.name','domestic_worker_at_recieptions.*','company_agents.phone_number')->simplePaginate(10);
    return view('premedicalmodule::domestic_workers_without_premedical',compact('all_domestic_workers'));
    }
/** 
 * This function searches for the pending dw workers
*/
protected function searchSuccessfulDW(){
    if(DomesticWorkerAtRecieption::where('dw_contact', request()->dw_contact)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Domestic worker Contact does not Exist');
        }
    $all_domestic_workers = DB::table('domestic_worker_at_pre_medicals')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_pre_medicals.domestic_worker_id')
        ->join('users','users.id','domestic_worker_at_pre_medicals.issuing_officer')
        ->where('domestic_worker_at_pre_medicals.deleted_at',null)
        ->where('domestic_worker_at_recieptions.dw_contact',request()->dw_contact)
        ->select('domestic_worker_at_recieptions.*','users.name','domestic_worker_at_pre_medicals.*')
        ->simplePaginate(10);
    return view('premedicalmodule::domestic_workers_at_premedical',compact('all_domestic_workers'));
}
/** 
 * This function searches for trashed dws
*/
protected function searchTrashedDW(){
    if(DomesticWorkerAtRecieption::where('dw_last_name', request()->dw_last_name)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('Domestic worker with this Name does not Exist, Please check the Spelling');
    } 
    $trashed_dw = DomesticWorkerAtPreMedical::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_pre_medicals.domestic_worker_at_registra_id')
    ->onlyTrashed()->where('domestic_worker_at_recieptions.dw_last_name',request()->dw_last_name)->simplePaginate(10);
    return view('premedicalmodule::trashed_dw',compact('trashed_dw'));
}
}
