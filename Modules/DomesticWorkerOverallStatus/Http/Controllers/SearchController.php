<?php

namespace Modules\DomesticWorkerOverallStatus\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\OtherReports\Entities\OtherReport;
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
        if(DomesticWorkerAtRecieption::where('dw_contact', request()->dw_contact)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Worker contact number does not Exist');
        }
        $get_dw =DB::table('other_reports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','other_reports.dw_at_other_reports_level_id')
        ->join('users','users.id','other_reports.created_by')
        ->where('other_reports.deleted_at', null)->where('other_reports.overal_status','pending')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','users.name',
                'other_reports.*','users.name')->where('domestic_worker_at_recieptions.dw_contact', request()->dw_contact)
                ->simplePaginate('10');
        return view('domesticworkeroverallstatus::index', compact('get_dw'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function searchPendingDw()
    {
        if(DomesticWorkerAtRecieption::where('dw_contact', request()->dw_contact)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Last Name does not Exist');
        }
        $get_all_pending_dw =DB::table('dw_employers')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','dw_employers.domestic_worker_id')
        ->join('abroad_companies','abroad_companies.id','dw_employers.company_id')
        ->where('dw_employers.status','pending')
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','dw_employers.*',
        'abroad_companies.name') ->where('domestic_worker_at_recieptions.dw_contact', request()->dw_contact)->simplePaginate(10);
        return view('domesticworkeroverallstatus::pending_travelling', compact('get_all_pending_dw'));
    }
    public function travelledDw($company_id)
    {
        if(DomesticWorkerAtRecieption::where('dw_contact', request()->dw_contact)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Worker Contact does not Exist');
        }
        $get_all_pending_dw =DB::table('dw_employers')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','dw_employers.domestic_worker_id')
        ->join('abroad_companies','abroad_companies.id','dw_employers.company_id')
        ->where('dw_employers.status','travelled')
        ->where('dw_employers.company_id',$company_id)
        ->select('domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_other_name','dw_employers.*',
        'abroad_companies.name','domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact')
        ->where('domestic_worker_at_recieptions.dw_contact', request()->dw_contact)->simplePaginate(10);
        return view('domesticworkeroverallstatus::travelled',compact('get_all_pending_dw'));
    }
}
