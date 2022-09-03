<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //This function gets dashboard
    protected function getDashboard(){
        //Count domestic workers
        $count_all_dw =DB::table('domestic_worker_at_recieptions')->where('deleted_at', null)->count();
        $count_all_dw_registered_today =DB::table('domestic_worker_at_recieptions')->where('deleted_at', null)->where('created_at','>=',Carbon::today())->count();
        $count_all_users =DB::table('users')->count();
        $count_company_agents =DB::table('company_agents')->where('deleted_at',null)->count();
        $get_total_amount =DB::table('domestic_worker_at_registras')->sum('office_or_premedical_fee');
        $get_total_amount_today =DB::table('domestic_worker_at_registras')->where('created_at','>=',Carbon::today())->sum('office_or_premedical_fee');
        //amount for this week
        //set day
        Carbon::setWeekStartsAt(Carbon::SUNDAY);
        $get_total_amount_this_week =DB::table('domestic_worker_at_registras')->whereBetween('created_at', [Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->sum('office_or_premedical_fee');
        //current month amount
        $get_total_amount_this_month =DB::table('domestic_worker_at_registras')->whereMonth('created_at', date('m'))
        ->whereYear('created_at', date('Y'))->sum('office_or_premedical_fee');
        //current Year Amount
        $get_total_amount_this_year =DB::table('domestic_worker_at_registras')->whereYear('created_at', date('Y'))->sum('office_or_premedical_fee');
        //This is to redirect for log in
        if(in_array('Can view Dashboard', auth()->user()->getUserPermisions())){
        return view('admin.dashboard', compact('count_all_dw','count_all_dw_registered_today','count_all_users','count_company_agents',
                    'get_total_amount','get_total_amount_today','get_total_amount_this_week','get_total_amount_this_month','get_total_amount_this_year'));
        }elseif(in_array('Can view Reception', auth()->user()->getUserPermisions())){
            return redirect('/recieptionmodule/all-domestic-workers');
        }elseif(in_array('Can view Registration', auth()->user()->getUserPermisions())){
            return redirect('/registramodule/');
        }elseif(in_array('Can view Premedical', auth()->user()->getUserPermisions())){
            return redirect('/premedicalmodule/');
        }elseif(in_array('Can view Passport', auth()->user()->getUserPermisions())){
            return redirect('/passportmodule/');
        }elseif(in_array('Can view CV', auth()->user()->getUserPermisions())){
            return redirect('/cv/all-dws');
        }elseif(in_array('Can view Training', auth()->user()->getUserPermisions())){
            return redirect('/trainingmodule/');
        }elseif(in_array('Can view Clearance', auth()->user()->getUserPermisions())){
            return redirect('/clearancemodule/');
        }else{
            return redirect('/otherreports/all-domestic-workers');
        }
    }
    
}
