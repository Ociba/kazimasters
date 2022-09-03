<?php

namespace Modules\PremedicalModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RegistraModule\Entities\DomesticWorkerAtRegistra;
use Modules\PremedicalModule\Entities\DomesticWorkerAtPreMedical;
use Modules\PremedicalModule\Http\Requests\AddDomesticWorkerAtPreMedicalFormRequest;
use Modules\RecieptionModule\Entities\DomesticWorkerAtRecieption;
use DB;

class PremedicalModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $all_domestic_workers=DB::table('domestic_worker_at_recieptions')
        ->join('users','users.id','domestic_worker_at_recieptions.created_by')
        ->join('company_agents','company_agents.id','domestic_worker_at_recieptions.agent_id')
        ->where('domestic_worker_at_recieptions.deleted_at',null)
        ->orderBy('domestic_worker_at_recieptions.created_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name',
        'users.name','domestic_worker_at_recieptions.*','company_agents.last_name','company_agents.phone_number')->simplePaginate(10);
        return view('premedicalmodule::index',compact('all_domestic_workers'));
    }

    
    /**
     * this function takes to the form of registering a dw
     */
    protected function registerDwForm($dw_id){
        return view('premedicalmodule::register_dw',compact('dw_id'));
    }
       /**
     * this function saves the domestic workers Premedical Report
     */
    private function saveDWMedicalReport($dw_id){
        $dw_medical_report = request()->premedical_report;
        $dw_medical_report_original = $dw_medical_report->getClientOriginalName();
        $dw_medical_report->move('dw_medical_reports/',$dw_medical_report_original);
        return $dw_medical_report_original;
    }
    /**
     * this function records the premedicalmodule details for a domestic worker
     * it takes the id of the domestic worker
     */
    protected function recordDWDomesticWorkerAtPreMedicalDetails(AddDomesticWorkerAtPreMedicalFormRequest $request){
        $dw_id = $request->domestic_worker_id;
        //save the validated model
        DomesticWorkerAtPreMedical::create($request->validated());
        //update the report in premedical
        //DomesticWorkerAtPreMedical::where('domestic_worker_id',$dw_id)->update(array('premedical_report'=>$this->saveDWMedicalReport($dw_id)));
        //update the premedical status
        DomesticWorkerAtRecieption::where('id',request()->domestic_worker_id)->update(array('premedical_status'=>'successful'));
        //return back to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function takes to the form for editing the dw at the premedicalmodule level
     */
    protected function editDwAtDomesticWorkerAtPreMedical($dw_id){
        $dw_info = DomesticWorkerAtPreMedical::where('domestic_worker_id',$dw_id)->get();
        return view('premedicalmodule::edit_dw_info',compact('dw_info'));
    }

    /**
     * this function updates the info of a domestic worker at the premedicalmodule level
     */
    protected function updateDomesticWorkerInfo($dw_id, AddDomesticWorkerAtPreMedicalFormRequest $request){
        DomesticWorkerAtPreMedical::where('id',$dw_id)->update($request->validated());
        //return to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function does a soft delete to a domestic worker at the premedicalmodule level
     */
    protected function deleteDwDomesticWorkerAtPreMedicalLevel(){
        $dw_id = request()->delete_dw;
        DomesticWorkerAtPreMedical::where('domestic_worker_id',$dw_id)->delete();
        //return to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function restores the info of a deleted domestic worker
     */
    protected function restoreDeletedDw($dw_id){
        DomesticWorkerAtPreMedical::where('domestic_worker_id',$dw_id)->restore();
        //return to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function gets the trashed domestic workers at the premedicalmodule level
     */
    protected function showTrash(){
        $trashed_dw = DomesticWorkerAtPreMedical::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_pre_medicals.domestic_worker_id')
        ->join('users','users.id','domestic_worker_at_pre_medicals.issuing_officer')
        ->onlyTrashed()->simplePaginate(10);
        return view('premedicalmodule::trashed_dw',compact('trashed_dw'));
    }

    /**
     * this function deletes the domestic worker from trash
     */
    protected function parmanetlyDeleteDW(){
        $dw_id = request()->delete_dw;
        DomesticWorkerAtPreMedical::where('domestic_worker_id',$dw_id)->forceDelete();
        //DWATREGISTRA::where('domestic_worker_at_recieptions_id',request()->domestic_worker_id)->update(array('premedical_status'=>'pending'));
        //return to previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function gets the domestic workers with premedical
     */
    protected function getDomesticWorkersWithPremedical(){
        $all_domestic_workers = DB::table('domestic_worker_at_pre_medicals')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_pre_medicals.domestic_worker_id')
        ->join('users','users.id','domestic_worker_at_pre_medicals.issuing_officer')
        ->where('domestic_worker_at_pre_medicals.deleted_at',null)
        ->orderBy('domestic_worker_at_pre_medicals.created_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name','users.name',
        'domestic_worker_at_pre_medicals.*','domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact')
        ->simplePaginate(10);
        return view('premedicalmodule::domestic_workers_at_premedical',compact('all_domestic_workers'));
    }
    /** 
     * This function returns page to print
    */
    protected function PrintPremedical(){
        $all_domestic_workers = DB::table('domestic_worker_at_pre_medicals')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_pre_medicals.domestic_worker_id')
        ->join('users','users.id','domestic_worker_at_pre_medicals.issuing_officer')
        ->where('domestic_worker_at_pre_medicals.deleted_at',null)
        ->orderBy('domestic_worker_at_pre_medicals.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','users.name','domestic_worker_at_pre_medicals.*','domestic_worker_at_pre_medicals.created_at')
        ->get();
        return view('premedicalmodule::print_premedical',compact('all_domestic_workers'));
    }
    /**
     * this function gets the domestic workers without premedical
     */
    protected function getDomesticWorkersWithoutPremedical(){
        $all_domestic_workers = DB::table('domestic_worker_at_recieptions')
        ->join('users','users.id','domestic_worker_at_recieptions.created_by')
        ->join('company_agents','company_agents.id','domestic_worker_at_recieptions.agent_id')->where('domestic_worker_at_recieptions.deleted_at',null)
        ->orderBy('created_at','Desc')->where('domestic_worker_at_recieptions.premedical_status','pending')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name',
        'domestic_worker_at_recieptions.dw_other_name','company_agents.phone_number',
        'users.name','domestic_worker_at_recieptions.*')->simplePaginate(10);
        return view('premedicalmodule::domestic_workers_without_premedical',compact('all_domestic_workers'));
    } 
}
