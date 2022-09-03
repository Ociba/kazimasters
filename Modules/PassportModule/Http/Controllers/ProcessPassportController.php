<?php

namespace Modules\PassportModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\PassportModule\Entities\ProcessPassport;
use Modules\PassportModule\Http\Requests\ProcessPassportRequestForm;
use DB;

class ProcessPassportController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function processDwPassport()
    {
        $get_all_dws =DB::table('domestic_worker_at_registras')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->join('users','users.id','domestic_worker_at_registras.user_id')
        ->where('domestic_worker_at_registras.passport_status','pending')
        ->where('domestic_worker_at_recieptions.passport_number',null)
        ->orderBy('domestic_worker_at_registras.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*',"domestic_worker_at_registras.created_at",'users.name','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->simplePaginate(10);
        return view('passportmodule::process_dw_passport',compact('get_all_dws'));
    }
    /** 
     * This function prints all dw whose passport are being processd
     */
    protected function printPassportsTobeProcessed(){
        $get_dw_with_passports_under_processing =DB::table('process_passports')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','process_passports.domestic_worker_id')
        ->join('domestic_worker_at_registras','domestic_worker_at_registras.domestic_worker_at_recieptions_id','process_passports.domestic_worker_id')
        ->join('users','users.id','process_passports.created_by')
        ->where('process_passports.status','pending')
        ->orderBy('process_passports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*','process_passports.*',"process_passports.created_at",'process_passports.domestic_worker_id','users.name')
        ->get();
        return view('passportmodule::print_processed_passports', compact('get_dw_with_passports_under_processing'));
    }
    /**
     *tThis function displays form to dw info
     * @return Renderable
     */
    protected function registerDwForm($dw_id){
        return view('passportmodule::register_dw_for_passport',compact('dw_id'));
    }

    /**
     * this function records the passport details for a domestic worker
     * it takes the id of the domestic worker
     */
    protected function processPassport(ProcessPassportRequestForm $request){
        //save the validated model
        ProcessPassport::create($request->validated());
        //return back to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * Show the table for dw whose passports are under processing.
     * @param int $id
     * @return Renderable
     */
    public function showDwPassportsUnderProcessing()
    {
        $get_dw_with_passports_under_processing =DB::table('process_passports')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','process_passports.domestic_worker_id')
        ->join('domestic_worker_at_registras','domestic_worker_at_registras.domestic_worker_at_recieptions_id','process_passports.domestic_worker_id')
        ->join('users','users.id','process_passports.created_by')
        ->where('process_passports.status','pending')
        ->orderBy('process_passports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*','process_passports.*',"process_passports.created_at",'process_passports.domestic_worker_id','users.name')
        ->simplePaginate(10);
        return view('passportmodule::dw_passports_processing', compact('get_dw_with_passports_under_processing'));
    }

     /**
     * this function updates the status to received markDwAtPassportNotReceived
     */
    protected function markDwAtPassport($dw_id){
        ProcessPassport::where('domestic_worker_id',$dw_id)->update(array('status'=>'received'));
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }

         /**
     * this function updates the status to others 
     */
    protected function markDwAtPassportNotReceived($dw_id){
        ProcessPassport::where('domestic_worker_id',$dw_id)->update(array('status'=>'others'));
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }

    /**
     * this function displays dws received passports
     */
    public function ReceivedPassports()
    {
        $received_dw_passports =DB::table('process_passports')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','process_passports.domestic_worker_id')
        ->join('domestic_worker_at_registras','domestic_worker_at_registras.domestic_worker_at_recieptions_id','process_passports.domestic_worker_id')
        ->join('users','users.id','process_passports.created_by')
        ->where('process_passports.status','received')
        ->orderBy('process_passports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*','process_passports.*',"process_passports.created_at",'users.name')
        ->simplePaginate(10);
        return view('passportmodule::received_dw_passports', compact('received_dw_passports'));
    }


   /**
     * this function displays dws whose passports were not processed
     */
    public function passportsNotReceived()
    {
        $dw_passports_not_recieved =DB::table('process_passports')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','process_passports.domestic_worker_id')
        ->join('domestic_worker_at_registras','domestic_worker_at_registras.domestic_worker_at_recieptions_id','process_passports.domestic_worker_id')
        ->join('users','users.id','process_passports.created_by')
        ->where('process_passports.status','others')
        ->orderBy('process_passports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*','process_passports.*',"process_passports.created_at",'users.name')
        ->simplePaginate(10);
        return view('passportmodule::not_received_dw_passports', compact('dw_passports_not_recieved'));
    }
    /**
     * search workers by date range   
     */
    public function SearchWorkersByDateRange(){
        $get_dw_with_passports_under_processing =DB::table('process_passports')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','process_passports.domestic_worker_id')
        ->join('domestic_worker_at_registras','domestic_worker_at_registras.domestic_worker_at_recieptions_id','process_passports.domestic_worker_id')
        ->join('users','users.id','process_passports.created_by')
        ->where('process_passports.status','pending')
        ->whereDate('process_passports.created_at', [request()->from_date, request()->to_date])
        ->orderBy('process_passports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','domestic_worker_at_registras.*','process_passports.*',"process_passports.created_at",'process_passports.domestic_worker_id','users.name')
        ->get();
        return view('passportmodule::print_processed_passports', compact('get_dw_with_passports_under_processing'));
    }
}
