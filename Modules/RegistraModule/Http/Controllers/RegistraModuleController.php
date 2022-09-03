<?php

namespace Modules\RegistraModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RegistraModule\Http\Requests\AddDWDataFormRequest;
use Modules\RegistraModule\Entities\DomesticWorkerAtRegistra;
use Modules\RecieptionModule\Entities\DomesticWorkerAtRecieption;
use Modules\PremedicalModule\Entities\DomesticWorkerAtPreMedical;
use DB;
use Carbon\Carbon;

class RegistraModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $domestic_workers = DB::table('domestic_worker_at_pre_medicals')->join('users','users.id','domestic_worker_at_pre_medicals.issuing_officer')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_pre_medicals.domestic_worker_id')
        ->where('domestic_worker_at_pre_medicals.deleted_at',null)->where('domestic_worker_at_pre_medicals.premedical_report','fit')->orderBy('domestic_worker_at_pre_medicals.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','users.name','domestic_worker_at_pre_medicals.*')->simplePaginate(10);
        return view('registramodule::index',compact('domestic_workers'));
    }

    /**
     * this function takes to the form of registering a dw
     */
    protected function registerDwForm($dw_id){
        return view('registramodule::register_dw',compact('dw_id'));
    }

    /**
     * this function creates the domestic worker at the registra
     */
    protected function createDwAtRegistra(AddDWDataFormRequest $request){
        DomesticWorkerAtRegistra::create($request->validated());
          //update the premedical status
          DomesticWorkerAtPreMedical::where('domestic_worker_id',request()->domestic_worker_at_recieptions_id)->update(array('registration_status'=>'successful'));
        //return to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function takes to the form for editing the dw at the registra level
     */
    protected function editDwAtRegistra($dw_id){
        $dw_info = DomesticWorkerAtRegistra::where('domestic_worker_at_recieptions_id',$dw_id)->get();
        return view('registramodule::edit_dw_info',compact('dw_info'));
    }

    /**
     * this function updates the info of a domestic worker at the registra level
     */
    protected function updateDomesticWorkerInfo($dw_id, AddDWDataFormRequest $request){
        DomesticWorkerAtRegistra::where('domestic_worker_at_recieptions_id',$dw_id)->update($request->validated());
        //return to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function does a soft delete to a domestic worker at the registra level
     */
    protected function deleteDwRecieptionLevel(){
        $dw_id = request()->delete_dw;
        DomesticWorkerAtRegistra::where('domestic_worker_at_recieptions_id',$dw_id)->delete();
        //return to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function restores the info of a deleted domestic worker
     */
    protected function restoreDeletedDw($dw_id){
        DomesticWorkerAtRegistra::where('domestic_worker_at_recieptions_id',$dw_id)->restore();
        return redirect()->back()->with('msg','Operation successful');
        //return to the previous route
    }

    /**
     * this function gets the trashed domestic workers at the registra level
     */
    protected function showTrash(){
        $trashed_dw = DomesticWorkerAtRegistra::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->join('users','users.id','domestic_worker_at_registras.user_id')
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*','users.name','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
         ->onlyTrashed()->orderBy('domestic_worker_at_registras.created_at','Desc')->simplePaginate('10');
        return view('registramodule::trashed_dw',compact('trashed_dw'));
    }

    /**
     * this function deletes the domestic worker from trash
     */
    protected function parmanetlyDeleteDW(){
        $dw_id = request()->delete_dw;
        DomesticWorkerAtRegistra::where('domestic_worker_at_recieptions_id',$dw_id)->forceDelete();
        //return to previous route
        return redirect()->back()->with('msg','Operation successful');
    }

    /**
     * these are todays domestic workers
     */
    protected function getNewDomesticWorkers(){
        $get_todays_registra_dw =DomesticWorkerAtRegistra::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->join('users','users.id','domestic_worker_at_registras.user_id')->where('domestic_worker_at_registras.deleted_at', null)
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*','users.name','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->orderBy('domestic_worker_at_registras.created_at','Desc')->simplePaginate(10);
        $get_total_amount =DB::table('domestic_worker_at_registras')->sum('office_or_premedical_fee');
        $get_total_amount_today =DB::table('domestic_worker_at_registras')->where('created_at','>=',Carbon::today())->sum('office_or_premedical_fee');
        return view('registramodule::todays_dws',compact('get_todays_registra_dw','get_total_amount','get_total_amount_today'));
    }
    /** 
     * View more on the successful domestic worker
    */
    protected function viewMoreOnDw($dw_id){
        $get_more_dw_info =DomesticWorkerAtRegistra::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->join('users','users.id','domestic_worker_at_registras.user_id')
        ->where('domestic_worker_at_registras.domestic_worker_at_recieptions_id',$dw_id)
        ->select('domestic_worker_at_recieptions.*',
                 'domestic_worker_at_registras.*','domestic_worker_at_registras.domestic_worker_at_recieptions_id','users.name')
                 ->get();
        
        return view('registramodule::more_dw_info',compact('get_more_dw_info'));
    }
      /** 
     * View more on the successful domestic worker
    */
    protected function printReceipt($dw_id){
        $print_dw_info =DomesticWorkerAtRegistra::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->join('users','users.id','domestic_worker_at_registras.user_id')
        ->where('domestic_worker_at_registras.domestic_worker_at_recieptions_id',$dw_id)
        ->select('domestic_worker_at_recieptions.*',
                 'domestic_worker_at_registras.*','domestic_worker_at_registras.domestic_worker_at_recieptions_id','users.name')
                 ->get();
        
        return view('registramodule::receipt',compact('print_dw_info'));
    }
    /** 
     * This function prints workers registration Information
    */
    protected function printWorkers(){
        $get_todays_registra_dw =DomesticWorkerAtRegistra::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->join('users','users.id','domestic_worker_at_registras.user_id')->where('domestic_worker_at_registras.deleted_at', null)
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*','users.name','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->orderBy('domestic_worker_at_registras.created_at','Desc')->get();
        return view('registramodule::print_registration_info',compact('get_todays_registra_dw'));
    }
    /** 
     * This function gets pending domestic workers
    */
    protected function getPendingDomesticWorkers(){
        $get_pending_dw = DB::table('domestic_worker_at_pre_medicals')->join('users','users.id','domestic_worker_at_pre_medicals.issuing_officer')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_pre_medicals.domestic_worker_id')
        ->where('domestic_worker_at_pre_medicals.deleted_at',null)->where('registration_status','pending')
        ->where('domestic_worker_at_pre_medicals.premedical_report','fit')
        ->orderBy('domestic_worker_at_pre_medicals.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','users.name','domestic_worker_at_pre_medicals.*',
          'domestic_worker_at_pre_medicals.domestic_worker_id')->simplePaginate(10);
        return view('registramodule::pending', compact('get_pending_dw'));
    }
    /** 
     * This function searches for domestic worker in registra
    */
    protected function searchDW(){
    if(DomesticWorkerAtRegistra::where('nationa_id_number', request()->nationa_id_number)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('Domestic worker with this NIN Number does not Exist, Please check the Number Properly');
    } 
    $get_todays_registra_dw =DomesticWorkerAtRegistra::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
    ->join('company_agents','company_agents.id','domestic_worker_at_registras.agent_id')
    ->join('users','users.id','domestic_worker_at_registras.user_id')
    ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name',
             'company_agents.last_name','company_agents.first_name','company_agents.other_names','domestic_worker_at_registras.*','users.name')
             ->where('domestic_worker_at_registras.nationa_id_number',request()->nationa_id_number)
             ->simplePaginate('10');
             $get_total_amount =DB::table('domestic_worker_at_registras')->sum('office_or_premedical_fee');
             $get_total_amount_today =DB::table('domestic_worker_at_registras')->where('created_at','>=',Carbon::today())->sum('office_or_premedical_fee');
             return view('registramodule::todays_dws',compact('get_todays_registra_dw','get_total_amount','get_total_amount_today'));
        
    }
}
