<?php

namespace Modules\PassportModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\PassportModule\Http\Requests\AddPassportFormRequest;
use Modules\PassportModule\Entities\Passport;
use Modules\RegistraModule\Entities\DomesticWorkerAtRegistra;
use Modules\RecieptionModule\Entities\DomesticWorkerAtRecieption;
use DB;

class PassportModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $get_dw_passport_info =DB::table('domestic_worker_at_registras')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->join('users','users.id','domestic_worker_at_registras.user_id')
        ->where('domestic_worker_at_registras.passport_status','pending')
        ->orderBy('domestic_worker_at_registras.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*',"domestic_worker_at_registras.created_at",'users.name')
        ->simplePaginate(10);
        return view('passportmodule::index', compact('get_dw_passport_info'));
    }

    /**
     * this function takes to the form of registering a dw
     */
    protected function registerDwForm($dw_id){
        $dw_nin = DB::table('domestic_worker_at_registras')->where('domestic_worker_at_recieptions_id',$dw_id)->value('nationa_id_number');
        $dw_passport_nummber = DB::table('domestic_worker_at_recieptions')->where('id',$dw_id)->value('passport_number');
        return view('passportmodule::register_dw',compact('dw_id','dw_nin','dw_passport_nummber'));
    }

    /**
     * this function saves the domestic workers CV
     */
    private function saveDWCV($dw_nin){
        $dw_cv = request()->dw_cv;
        $dw_cv_original = $dw_cv->getClientOriginalName();
        $dw_cv->move('dw_cvs/',$dw_cv_original);

        Passport::where('dw_nin',$dw_nin)->update(array(
            'dw_cv' =>$dw_cv_original
        ));
    }
      /**
     * this function saves the domestic workers passport copy
     */
    private function saveDWPassportCopy($dw_id){
        $dw_passport_copy = request()->passport;
        $dw_passport_copy_original = $dw_passport_copy->getClientOriginalName();
        $dw_passport_copy->move('dw_passport/',$dw_passport_copy_original);
        return $dw_passport_copy_original;
    }
    /**
     * this function records the passport details for a domestic worker
     * it takes the id of the domestic worker
     */
    protected function recordDWPassportDetails(AddPassportFormRequest $request){
        $dw_id = $request->domestic_worker_id;
        //save the validated model
        Passport::create($request->validated());
        //save the dws id
        $dw_nin = request()->dw_nin;
        $this->saveDWCV($dw_nin);
        //This function  updates what is being saved
        Passport::where('domestic_worker_id',$dw_id)->update(array( 
            'passport'=>$this->saveDWPassportCopy($dw_id),
        ));
        //update Registra passport status
        DomesticWorkerAtRegistra::where('domestic_worker_at_recieptions_id',request()->domestic_worker_id)->update(array('passport_status'=>'successful'));
         //update Registra passport status
         DomesticWorkerAtRecieption::where('id',request()->domestic_worker_id)->update(array('passport_number'=>request()->passport_number));
        //return back to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * this function takes to the form for editing the dw at the passport level
     */
    protected function editDwAtPassport($dw_id){
        $dw_info = Passport::where('domestic_worker_id',$dw_id)->get();
        return view('passportmodule::edit_dw_info',compact('dw_info'));
    }

    /**
     * this function updates the info of a domestic worker at the passport level
     */
    protected function updateDomesticWorkerInfo($dw_id, AddPassportFormRequest $request){
        Passport::where('domestic_worker_id',$dw_id)->update($request->validated());
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }

    /**
     * this function does a soft delete to a domestic worker at the passport level
     */
    protected function deleteDwPassportLevel(){
        $dw_id = request()->delete_dw;
        Passport::where('domestic_worker_id',$dw_id)->delete();
        //return to the previous route
        return redirect()->back()->with('msg', 'Operation successfull');
    }

    /**
     * this function restores the info of a deleted domestic worker
     */
    protected function restoreDeletedDw($dw_id){
        Passport::where('domestic_worker_id',$dw_id)->restore();
        //return to the previous route
        return redirect()->back()->with('msg', 'Operation successfull');
    }

    /**
     * this function gets the trashed domestic workers at the passport level
     */
    protected function showTrash(){
        $trashed_dw = Passport::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
        ->join('users','users.id','passports.created_by')
        ->select('passports.*','domestic_worker_at_recieptions.*','passports.updated_at','users.name')
        ->onlyTrashed()->simplePaginate(10);
        return view('passportmodule::trashed_dw',compact('trashed_dw'));
    }

    /**
     * this function deletes the domestic worker from trash
     */
    protected function parmanetlyDeleteDW(){
        $dw_id = request()->delete_dw;
        Passport::where('domestic_worker_id',$dw_id)->forceDelete();
        //return to previous route
        return redirect()->back()->with('msg', 'Operation successfull');
    }

    /**
     * this function gets the domestic workers with the passport
     */
    protected function getDomesticWorkersWithPassport(){
        $with_passport = DB::table('passports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
        ->join('users','users.id','passports.created_by')
        ->where('passports.deleted_at',null)->orderBy('passports.created_at','Desc')
        ->select('passports.*','domestic_worker_at_recieptions.*','passports.created_at','users.name')->simplePaginate(10);
        return view('passportmodule::domestic_workers_with_passport',compact('with_passport'));
    }
    /** 
     * This function returns page for printing
    */
    protected function printPassportsInfo(){
        $with_passport = DB::table('passports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
        ->join('users','users.id','passports.created_by')
        ->where('passports.deleted_at',null)->orderBy('passports.created_at','Desc')
        ->select('passports.*','domestic_worker_at_recieptions.*','passports.created_at','users.name')->simplePaginate(10);
        return view('passportmodule::print_passport_details',compact('with_passport'));
    }
    /**
     * this function gets the domestic workers without passports
     */
    protected function getDomesticWorkersWithOutPassport(){
        $with_out_passport =DB::table('domestic_worker_at_registras')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->join('users','users.id','domestic_worker_at_registras.user_id')
        ->where('domestic_worker_at_registras.passport_status','pending')
        ->orderBy('domestic_worker_at_registras.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*',"domestic_worker_at_registras.created_at",'users.name')
        ->simplePaginate(10);
        return view('passportmodule::domestic_workers_without_passport',compact('with_out_passport'));
    }
}
