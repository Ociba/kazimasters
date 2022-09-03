<?php

namespace Modules\DomesticWorkerOverallStatus\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\OtherReports\Entities\OtherReport;
use DB;

class AllWorkersInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function allWorkersInformation()
    {
        $all_workers =DB::table('other_reports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','other_reports.dw_at_other_reports_level_id')
        ->join('users','users.id','other_reports.created_by')
        ->where('other_reports.deleted_at', null)->where('other_reports.overal_status','pending')
        ->orderBy('other_reports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','users.name',
                'other_reports.*','users.name')->orderBy('other_reports.created_by','Desc')->simplePaginate('10');
        return view('domesticworkeroverallstatus::all_workers', compact('all_workers'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function viewallWorkersInformation($worker_id)
    {
    $get_all_cleared_dw =OtherReport::join('domestic_worker_at_recieptions','other_reports.dw_at_other_reports_level_id','domestic_worker_at_recieptions.id')
    ->where('other_reports.deleted_at',null)->join('users','users.id','other_reports.created_by')
    ->where('other_reports.dw_at_other_reports_level_id',$worker_id)
    ->get(['domestic_worker_at_recieptions.*','other_reports.*','users.name']);
    //get company agent
    $get_agent =DB::table('domestic_worker_at_recieptions')->join('users','users.id','domestic_worker_at_recieptions.created_by')
        ->join('company_agents','company_agents.id','domestic_worker_at_recieptions.agent_id')
        ->where('domestic_worker_at_recieptions.id',$worker_id)->get(['company_agents.*']);
    $get_premedical =DB::table('domestic_worker_at_pre_medicals')->where('domestic_worker_id',$worker_id)->get();
    $get_registration_info =DB::table('domestic_worker_at_registras')->where('domestic_worker_at_recieptions_id',$worker_id)->get();
    $get_passport_info =DB::table('passports')->where('domestic_worker_id',$worker_id)->get();
        return view('domesticworkeroverallstatus::all_workers_information', compact('get_all_cleared_dw','get_agent','get_premedical','get_registration_info','get_passport_info'));
    }
}
