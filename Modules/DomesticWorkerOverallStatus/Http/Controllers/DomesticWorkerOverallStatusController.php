<?php

namespace Modules\DomesticWorkerOverallStatus\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use DB;
use Modules\DomesticWorkerOverallStatus\Http\Requests\DwEmployerRequestForm;
use Modules\DomesticWorkerOverallStatus\Entities\DwEmployer;
use Modules\OtherReports\Entities\OtherReport;

class DomesticWorkerOverallStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $get_dw =DB::table('other_reports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','other_reports.dw_at_other_reports_level_id')
        ->join('users','users.id','other_reports.created_by')
        ->where('other_reports.deleted_at', null)->where('other_reports.overal_status','pending')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','users.name',
                'other_reports.*','users.name')->orderBy('other_reports.created_by','Desc')->simplePaginate('10');
        return view('domesticworkeroverallstatus::index', compact('get_dw'));
    }
    /** 
     * This function returns add details form
    */
     protected function addDwEmployerDetails($dw_id){
         $get_company =DB::table('abroad_companies')->select('id','name')->get();
        return view('domesticworkeroverallstatus::register_dw_employer_info',compact('dw_id','get_company'));
     }
        /**
     * this function saves the domestic workers overal status visa
     */
     private function saveDWVisa($dw_id){
        $dw_visa = request()->visa;
        $dw_visa_original = $dw_visa->getClientOriginalName();
        $dw_visa->move('dw_employer_visa/',$dw_visa_original);
        return $dw_visa_original;
    }
    /**
     * This function creates dw Employer information.
     * @return Renderable
     */
    public function createDwEmployerInfo(DwEmployerRequestForm $request)
    {
        $dw_id = $request->domestic_worker_id;
        //save the validated model
        DwEmployer::create($request->validated());
        //update the visa in Overal status
        DwEmployer::where('domestic_worker_id',$dw_id)->update(array('visa'=>$this->saveDWVisa($dw_id)));
        //update the other reports overal status
        OtherReport::where('dw_at_other_reports_level_id',request()->domestic_worker_id)->update(array('overal_status'=>'successful'));
        //return back to the previous route
        return redirect()->back()->with('msg','operation successful');
    }
    /**
     * This function displays pending domestic worker.
     */
    public function PendingDw()
    {
        $get_all_pending_dw =DB::table('dw_employers')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','dw_employers.domestic_worker_id')
        ->join('abroad_companies','abroad_companies.id','dw_employers.company_id')
        ->where('dw_employers.status','pending')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','dw_employers.*',
        'abroad_companies.name')->simplePaginate(10);
        return view('domesticworkeroverallstatus::pending_travelling', compact('get_all_pending_dw'));
    }
    /** 
     * Print workers ready to travel
    */
    protected function printWorkersReadyToTravel(){
        $get_all_pending_dw =DB::table('dw_employers')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','dw_employers.domestic_worker_id')
        ->join('abroad_companies','abroad_companies.id','dw_employers.company_id')
        ->where('dw_employers.status','pending')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','dw_employers.*',
        'abroad_companies.name')->get();
        return view('domesticworkeroverallstatus::workers_employer_details', compact('get_all_pending_dw'));
    }

    /**
     * This function marks the overall status as travelled.
     */
    public function markAsTravelled($dw_id){
        DwEmployer::where('domestic_worker_id',$dw_id)->update(array('status'=>'travelled'));
         //return back to the previous route
         return redirect()->back()->with('msg','operation successful');
    }
    /** 
     * This function gets all the abroad companies
    */
    protected function getCompaniesAbroad(){
        $get_all_the_companies =DwEmployer::join('abroad_companies','abroad_companies.id','dw_employers.company_id')
        ->distinct('dw_employers.company_id')
        ->select('abroad_companies.name','dw_employers.company_id')->get();
        return view('domesticworkeroverallstatus::companies',compact('get_all_the_companies'));
    }
    /** 
     * This displays dw that travelled to particular company
    */
    public function Travelled($company_id)
    {
        $get_all_pending_dw =DB::table('dw_employers')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','dw_employers.domestic_worker_id')
        ->join('abroad_companies','abroad_companies.id','dw_employers.company_id')
        ->where('dw_employers.status','travelled')
        ->where('dw_employers.company_id',$company_id)
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name','dw_employers.*',
        'abroad_companies.name','abroad_companies.id','domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact')->simplePaginate(10);
        return view('domesticworkeroverallstatus::travelled',compact('get_all_pending_dw','company_id'));
    }

    /**
     * This function marks the overall status as did not travel.
     */
    public function markAsDidnotTravelled($dw_id){
        DwEmployer::where('domestic_worker_id',$dw_id)->update(array('status'=>'did not'));
         //return back to the previous route
         return redirect()->back()->with('msg','operation successful');
    }
     /** 
     * This displays dw that did not travel
    */
    public function DidnotTravelled()
    {
        $get_all_pending_dw =DB::table('dw_employers')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','dw_employers.domestic_worker_id')
        ->join('abroad_companies','abroad_companies.id','dw_employers.company_id')
        ->where('dw_employers.status','did not')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name','dw_employers.*',
        'abroad_companies.name','domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact',)->simplePaginate(10);
        return view('domesticworkeroverallstatus::did_not_travel',compact('get_all_pending_dw'));
    }
     /**
     * This function marks the overall status as returned.
     */
    public function markAsReturned($dw_id){
        DwEmployer::where('domestic_worker_id',$dw_id)->update(array('status'=>'returned'));
         //return back to the previous route
         return redirect()->back()->with('msg','operation successful');
    }
     /** 
     * This displays dw that returned
    */
    public function DwsReturned()
    {
        $get_all_pending_dw =DB::table('dw_employers')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','dw_employers.domestic_worker_id')
        ->join('abroad_companies','abroad_companies.id','dw_employers.company_id')
        ->where('dw_employers.status','returned')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name','dw_employers.*',
        'abroad_companies.name','domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact',)->simplePaginate(10);
        return view('domesticworkeroverallstatus::returned',compact('get_all_pending_dw'));
    }
    /**
     * This function marks the overall status as renewed.
     */
    public function markAsContractRenewed($dw_id){
        DwEmployer::where('domestic_worker_id',$dw_id)->update(array('status'=>'renewed'));
         //return back to the previous route
         return redirect()->back()->with('msg','operation successful');
    }
     /** 
     * This displays dw that returned
    */
    public function DwsRenewedContract()
    {
        $get_all_pending_dw =DB::table('dw_employers')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','dw_employers.domestic_worker_id')
        ->join('abroad_companies','abroad_companies.id','dw_employers.company_id')
        ->where('dw_employers.status','renewed')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name','dw_employers.*',
        'abroad_companies.name','domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact',)->simplePaginate(10);
        return view('domesticworkeroverallstatus::renewed',compact('get_all_pending_dw'));
    }
        /** 
     * This function returns edit renewed contract details form
    */
    protected function dwRenewedContractDetails($dw_id){
        $dw_info = DwEmployer::where('domestic_worker_id',$dw_id)->get();
       return view('domesticworkeroverallstatus::edit_dw_employer_info',compact('dw_id','dw_info'));
    }
     /**
     * this function updates the info of Dw
     */
    protected function updateDomesticWorkerInfo($dw_id, DwEmployerRequestForm $request){
        DwEmployer::where('domestic_worker_id',$dw_id)->update($request->validated());
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }
}
