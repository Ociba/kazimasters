<?php

namespace Modules\ClearanceModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ClearanceModule\Entities\Clearance;
use Modules\TrainingModule\Entities\Training;
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
        if(Training::where('visa_number', request()->visa_number)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Worker with this Visa Number does not Exist');
        }
        $get_dw_to_be_cleared =DB::table('trainings')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
        ->join('users','users.id','trainings.created_by')
        ->where('trainings.visa_number', request()->visa_number)
        ->select('users.name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','trainings.*')
        ->simplePaginate(10);
        return view('clearancemodule::index', compact('get_dw_to_be_cleared'));
    }
    /** 
     * This function searches for successfull cleared domestic worker
    */
    protected function searchClearedSuccessfullWorker(){
        if(DomesticWorkerAtRecieption::where('dw_last_name', request()->dw_last_name)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Worker with this Last Name does not Exist');
        }
        $get_cleared_dw =DB::table('clearances')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','clearances.domestic_worker_id')
        ->join('users','users.id','clearances.created_by')
        ->where('clearances.deleted_at',null)
        ->where('domestic_worker_at_recieptions.dw_last_name', request()->dw_last_name)
        ->select('users.name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','clearances.*')
        ->simplePaginate(10);
        return view('clearancemodule::cleared_workers',compact('get_cleared_dw'));
    }
    /** 
     * This function searches for pending DW
    */
    protected function searchDWToBeCleared(){
        if(Training::where('visa_number', request()->visa_number)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Worker with this visa number does not Exist');
        } 
        $get_dw_for_clearance =DB::table('trainings')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
        ->join('users','users.id','trainings.created_by')
        ->where('trainings.visa_number', request()->visa_number)
        ->select('users.name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','trainings.*','trainings.dw_id_worker')
        ->simplePaginate(10);
        return view('clearancemodule::pending_clearnce_workers',compact('get_dw_for_clearance'));
    }
     /** 
     * This function searches for trashed domestic worker 
    */
    protected function searchTrashedDw(){
        if(DomesticWorkerAtRecieption::where('dw_last_name', request()->dw_last_name)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Worker with this Last Name does not Exist');
        }
        $trashed_dw = Clearance::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','clearances.domestic_worker_id')->onlyTrashed()
        ->where('domestic_worker_at_recieptions.dw_last_name', request()->dw_last_name)
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','clearances.*')->simplePaginate('10');
        return view('clearancemodule::trashed_dw',compact('trashed_dw'));
    }
}
