<?php

namespace Modules\RecieptionModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RecieptionModule\Http\Requests\RegisterDWDateFormRequest;
use Modules\RecieptionModule\Entities\DomesticWorkerAtRecieption;
use Carbon\Carbon;
use DB;

class RecieptionModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $get_dw_worker =DB::table('domestic_worker_at_recieptions')->join('users','users.id','domestic_worker_at_recieptions.created_by')
        ->where('domestic_worker_at_recieptions.deleted_at',null)->orderBy('domestic_worker_at_recieptions.created_by','Desc')
        ->select('users.name','domestic_worker_at_recieptions.*')->simplePaginate('10');
        return view('recieptionmodule::index',compact('get_dw_worker'));
    }
    /** 
     * This function returns page to print all registered workers
    */
    protected function viewPageToPrint(){
        $get_all_domestic_workers =DB::table('domestic_worker_at_recieptions')->join('users','users.id','domestic_worker_at_recieptions.created_by')
        ->join('company_agents','company_agents.id','domestic_worker_at_recieptions.agent_id')
        ->where('domestic_worker_at_recieptions.deleted_at',null)->orderBy('domestic_worker_at_recieptions.created_at','Desc')
        ->select('users.name','domestic_worker_at_recieptions.*','company_agents.*')->simplePaginate('10');
        return view('recieptionmodule::print_page', compact('get_all_domestic_workers'));
    }
    /**
     * this function takes to the blade that has a form for registering a new domestic worker
     * at the recieption
     */
    protected function registerNewDomesticWorker(){
        $get_agent_for_dw =DB::table('company_agents')->where('deleted_at',null)->get();
        return view('recieptionmodule::registration_new_dw_form', compact('get_agent_for_dw'));
    }
    /** 
     * This function saves the workers photo
    */
    private function saveWorkersPhoto(){
        $dw_photo = request()->photo;
        $dw_photo_original = $dw_photo->getClientOriginalName();
        $dw_photo->move('dw_photo/',$dw_photo_original);
        return $dw_photo_original;
    }
    /**
     * this function validates the domestic worker information
     * @param  Modules\RecieptionModule\Http\Requests\RegisterDWDateFormRequest  $request
     */
    protected function saveDwInfo(RegisterDWDateFormRequest $request){
        //save the validated input data
        DomesticWorkerAtRecieption::create($request->validated());
        //save Photo in Reception
         //update the report in premedical
         //DomesticWorkerAtRecieption::where('photo',request()->photo)->update(array('photo'=>$this->saveWorkersPhoto()));
        return redirect()->back()->with('msg','You have added '.request()->dw_first_name.' Successfully');
        //return back to the previous route
        
    }

    /**
     * this function takes to the page at which the users data is to be updated
     */
    protected function editUserDataForm($dw_id){
        $user_data = DomesticWorkerAtRecieption::where('id',$dw_id)->get();
        return view('recieptionmodule::update_dw_info_form',compact('user_data'));
    }

    /**
     * this function updates the user data
     */
    protected function updateUserData(RegisterDWDateFormRequest $request, $dw_id){
        DomesticWorkerAtRecieption::where('id',$dw_id)->update($request->validated());
        //return back to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function deletes the dw at the recieption level softly
     */
    protected function softDeleteDomesticWorker(){
        $dw_id = request()->delete_dw;
        DomesticWorkerAtRecieption::where('id',$dw_id)->delete();
        //return back to previous url
        return redirect()->back()->with('msg','Operation successful');
    }

    /**
     * this function restores the deleted dw at the recieption level
     */
    protected function restoreDeletedDw($dw_id){
        DomesticWorkerAtRecieption::where('id',$dw_id)->restore();
        //return to the previous url
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function gets the trashed domestic workers at the recieption level
     */
    protected function getTrashedDws(){
        $get_trashed_domestic_workers =DomesticWorkerAtRecieption::onlyTrashed()->simplePaginate(10);
        return view('recieptionmodule::trashed_dws', compact('get_trashed_domestic_workers'));
    }

    /**
     * this function deletes the domestic worker at the recieption level parmanetly from the trash
     */
    protected function deleteDwParmanently(){
        $dw_id = request()->delete_dw;
        DomesticWorkerAtRecieption::where('id',$dw_id)->forceDelete();
        return redirect()->back()->with('msg','Operational Successful');
        //return to the previous url
    }

    /**
     * this function gets all the domestic workers
     */
    protected function getAllDomesticWorkers(){
        $get_all_domestic_workers =DB::table('domestic_worker_at_recieptions')->join('users','users.id','domestic_worker_at_recieptions.created_by')
        ->where('domestic_worker_at_recieptions.deleted_at',null)->orderBy('domestic_worker_at_recieptions.created_at','Desc')
        ->select('users.name','domestic_worker_at_recieptions.*')->simplePaginate('10');
        return view('recieptionmodule::all_dws', compact('get_all_domestic_workers'));
    }
    /** 
     * View more information about this domestic worker
    */
    protected function viewMoreInfo($dw_id){
        $view_more_domestic_worker_info =DB::table('domestic_worker_at_recieptions')
        ->join('users','users.id','domestic_worker_at_recieptions.created_by')
        ->join('company_agents','company_agents.id','domestic_worker_at_recieptions.agent_id')
        ->where('domestic_worker_at_recieptions.deleted_at',null)->orderBy('domestic_worker_at_recieptions.created_at','Desc')
        ->where('domestic_worker_at_recieptions.id',$dw_id)
        ->select('users.name','domestic_worker_at_recieptions.*','company_agents.last_name','company_agents.first_name','company_agents.other_names','company_agents.phone_number',
        'company_agents.agent_nin')->get();
        return view('recieptionmodule::view_more_dw_info', compact('view_more_domestic_worker_info'));
    }
    /**
     * this functoin gets the todays domestic workers
     */
    protected function newDomesticWorkers(){
        $get_todays_worker =DomesticWorkerAtRecieption::join('users','users.id','domestic_worker_at_recieptions.created_by')
        ->where('domestic_worker_at_recieptions.deleted_at',null)->orderBy('domestic_worker_at_recieptions.created_at','Desc')->whereDate('domestic_worker_at_recieptions.created_at',Carbon::now())
        ->select('users.name','domestic_worker_at_recieptions.*')
        ->simplePaginate(10);
        return view('recieptionmodule::todays_dws', compact('get_todays_worker'));
    }

}
