<?php

namespace Modules\TrainingModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\TrainingModule\Http\Requests\AddDWTrainingPerformanceFormRequest;
use Modules\TrainingModule\Entities\Training;
use Modules\PassportModule\Entities\Passport;
use DB;

class TrainingModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $get_dw_for_training =DB::table('passports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
        ->join('users','users.id','passports.created_by')
        ->where('passports.deleted_at',null)
        ->where('passports.training_status','pending')
        ->orderBy('passports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','passports.*','users.name')
        ->simplePaginate();
        return view('trainingmodule::index', compact('get_dw_for_training'));
    }

    /**
     * this function gets the domestic workers with reports
     */
    protected function domesticWorkersWithTraining(){
        $get_dw_for_with_training =DB::table('trainings')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
        ->join('users','users.id','trainings.created_by')
        ->where('trainings.deleted_at',null)->orderBy('trainings.created_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','domestic_worker_at_recieptions.dw_contact',
        'domestic_worker_at_recieptions.nok_contact','trainings.*','users.name')
        ->simplePaginate(10);
        return view('trainingmodule::with_training', compact('get_dw_for_with_training'));
    }
    /** 
     * This function gets page to print dw
    */
    protected function printWorkerInfo(){
        $get_dw_for_with_training =DB::table('trainings')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
        ->join('users','users.id','trainings.created_by')
        ->where('trainings.deleted_at',null)->orderBy('trainings.created_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','domestic_worker_at_recieptions.dw_contact',
        'domestic_worker_at_recieptions.nok_contact','trainings.*','users.name','trainings.created_at')
        ->get();
        return view('trainingmodule::print_training_info', compact('get_dw_for_with_training'));
    }
    /**
     * this function gets the domestic workers without training
     */
    protected function domesticWorkersWithoutTraining(){
        $get_dw_for_without_training =DB::table('passports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
        ->join('users','users.id','passports.created_by')
        ->where('passports.deleted_at',null)
        ->where('passports.training_status','pending')
        ->orderBy('passports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','domestic_worker_at_recieptions.dw_contact',
        'domestic_worker_at_recieptions.nok_contact','passports.*','users.name')
        ->simplePaginate(10);
        return view('trainingmodule::without_training', compact('get_dw_for_without_training'));
    }

    /**
     * this function takes to the form of registering a dw about the training
     */
    protected function registerDwTrainingForm($dw_id){
        return view('trainingmodule::record_dw_performance',compact('dw_id'));
    }
      /**
     * this function saves the domestic workers Training Performance Report
     */
    private function saveDWTrainingPerformanceReport($dw_id){
        $training_performance_report = request()->training_performance_report;
        $training_performance_report_original = $training_performance_report->getClientOriginalName();
        $training_performance_report->move('dw_training_performance_report/',$training_performance_report_original);
        return $training_performance_report_original;
    }

    /**
     * this function creates the domestic worker at the training
     */
    protected function createDwAtTraining(AddDWTrainingPerformanceFormRequest $request){
        $dw_id = $request->dw_id_worker;
        Training::create($request->validated());
        //update the trainining performance and contract
        Training::where('dw_id_worker',$dw_id)->update(array(
            'training_performance_report'=>$this->saveDWTrainingPerformanceReport($dw_id),
            'contract'                   =>$this->saveDWContract($dw_id)
        ));
        //update passports training staus
        Passport::where('domestic_worker_id',request()->dw_id_worker)->update(array('training_status'=>'successful'));
        //return to the previous route
        return redirect()->back()->with('msg','operation successful');
    }
    /**
     * this function saves the domestic workers Contract
     */
    private function saveDWContract($dw_id){
        $contract = request()->contract;
        $dw_contract_original = $contract->getClientOriginalName();
        $contract->move('dw_contract/',$dw_contract_original);
        return $dw_contract_original;
    }
    /**
     * this function takes to the form for editing the dw at the registra level
     */
    protected function editDwAtTraining($dw_id){
        $dw_info = Training::where('id',$dw_id)->get();
        return view('trainingmodule::edit_dw_info',compact('dw_info'));
    }

    /**
     * this function updates the info of a domestic worker at the training level
     */
    protected function updateDomesticWorkerTrainingReport($dw_id, AddDWTrainingPerformanceFormRequest $request){
        Training::where('id',$dw_id)->update($request->validated());
        //return to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function does a soft delete to a domestic worker at the training level
     */
    protected function deleteDwAtTrainingLevel(){
        $dw_id = request()->delete_dw;
        Training::where('id',$dw_id)->delete();
        //return to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function restores the info of a deleted domestic worker
     */
    protected function restoreDeletedDwReport($dw_id){
        Training::where('dw_id_worker',$dw_id)->restore();
        //return to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function gets the trashed domestic workers at the training level
     */
    protected function showTrash(){
        $trashed_dw = Training::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
        ->join('users','users.id','trainings.created_by')
        ->orderBy('trainings.updated_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','domestic_worker_at_recieptions.dw_contact',
        'domestic_worker_at_recieptions.nok_contact','trainings.*','users.name')->onlyTrashed()->simplePaginate(10);
        return view('trainingmodule::trashed_dw',compact('trashed_dw'));
    }

    /**
     * this function deletes the domestic worker from trash
     */
    protected function parmanetlyDeleteDW(){
        $dw_id = request()->delete_dw;
        Training::where('dw_id_worker',$dw_id)->forceDelete();
        //return to previous route
        return redirect()->back()->with('msg','operation successful');
    }
}
