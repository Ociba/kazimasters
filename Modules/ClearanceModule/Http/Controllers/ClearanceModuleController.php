<?php

namespace Modules\ClearanceModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ClearanceModule\Http\Requests\ClearanceFormRequest;
use Modules\ClearanceModule\Entities\Clearance;
use Modules\TrainingModule\Entities\Training;
use DB;

class ClearanceModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $get_dw_to_be_cleared =DB::table('trainings')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
        ->join('users','users.id','trainings.created_by')
        ->orderBy('trainings.created_at','Desc')
        ->where('trainings.deleted_at',null)
        ->where('trainings.clearance_status','pending')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','trainings.*','users.name')
        ->simplePaginate(10);
        return view('clearancemodule::index', compact('get_dw_to_be_cleared'));
    }

    /**
     * this function gets cleared domestic workers
     */
    protected function getClearedDomesticWorkers(){
        $get_cleared_dw =DB::table('clearances')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','clearances.domestic_worker_id')
        ->where('clearances.deleted_at',null)
        ->join('users','users.id','clearances.created_by')
        ->orderBy('clearances.created_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','clearances.*','users.name')
        ->simplePaginate(10);
        return view('clearancemodule::cleared_workers',compact('get_cleared_dw'));
    }
    /** 
     * This function gets workers who are fit in clearance
    */
    protected function printClearedWorkers(){
        $get_cleared_dw =DB::table('clearances')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','clearances.domestic_worker_id')
        ->where('clearances.deleted_at',null)
        ->join('users','users.id','clearances.created_by')
        ->orderBy('clearances.created_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','clearances.*','users.name')
        ->get();
        return view('clearancemodule::print_cleared_workers',compact('get_cleared_dw'));
    }
    /**
     * this function get domestic workers with pending clearance
     */
    protected function getDomesticWorkersWithPendingClearance(){
        $get_dw_for_clearance =DB::table('trainings')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
        ->join('users','users.id','trainings.created_by')
        ->orderBy('trainings.created_at','Desc')
        ->where('trainings.clearance_status','pending')
        ->where('trainings.deleted_at',null)
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','trainings.*','trainings.dw_id_worker','users.name')
        ->simplePaginate(10);
        return view('clearancemodule::pending_clearnce_workers',compact('get_dw_for_clearance'));
    }

    /**
     * this function takes to the form of clearing a dw
     */
    protected function clearDwForm($dw_id){
        return view('clearancemodule::clear_dw',compact('dw_id'));
    }

    /**
     * this function records the clearance details for a domestic worker
     * it takes the id of the domestic worker
     */
    protected function recordDWClearanceDetails(ClearanceFormRequest $request){
        //save the validated model
        Clearance::create($request->validated());
        //update passports training staus
        Training::where('dw_id_worker',request()->domestic_worker_id)->update(array('clearance_status'=>'successful'));
        //return back to the previous route
        return redirect()->back()->with('msg','Operation successful');
    }

    /**
     * this function takes to the form for editing the dw at the clearance level
     */
    protected function editDwAtClearance($dw_id){
        $dw_info = Clearance::where('domestic_worker_id',$dw_id)->get();
        return view('clearancemodule::edit_dw_info',compact('dw_info'));
    }

    /**
     * this function updates the info of a domestic worker at the clearance level
     */
    protected function updateDomesticWorkerInfo($dw_id, ClearanceFormRequest $request){
        Clearance::where('domestic_worker_id',$dw_id)->update($request->validated());
        //return to the previous route
        return redirect()->back()->with('msg','Operation successful');
    }

    /**
     * this function does a soft delete to a domestic worker at the clearance level
     */
    protected function deleteDwClearanceLevel(){
        $dw_id = request()->delete_dw;
        Clearance::where('domestic_worker_id',$dw_id)->delete();
        //return to the previous route
        return redirect()->back()->with('msg','Operation successful');
    }

    /**
     * this function restores the info of a deleted domestic worker
     */
    protected function restoreDeletedDw($dw_id){
        Clearance::where('domestic_worker_id',$dw_id)->restore();
        //return to the previous route
        return redirect()->back()->with('msg','Operation successful');
    }

    /**
     * this function gets the trashed domestic workers at the clearance level
     */
    protected function showTrash(){
        $trashed_dw = Clearance::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','clearances.domestic_worker_id')
        ->join('users','users.id','clearances.created_by')->onlyTrashed()
        ->orderBy('clearances.updated_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','clearances.*')->simplePaginate('10');
        return view('clearancemodule::trashed_dw',compact('trashed_dw'));
    }

    /**
     * this function deletes the domestic worker from trash
     */
    protected function parmanetlyDeleteDW(){
        $dw_id = request()->delete_dw;
        Clearance::where('domestic_worker_id',$dw_id)->forceDelete();
        //return to previous route
        return redirect()->back()->with('msg','Operation successful');
    }

    /**
     * this function gets the user profile
     */
    protected function userProfile(){
        return view('clearancemodule::profile');
    }
}
