<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Modules\PassportModule\Entities\Passport;

class CVController extends Controller
{
    /**
     * this function takes to the allDomesticWokers
     */
    protected function allDomesticWokers(){
        $get_dw_cv = DB::table('passports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
        ->join('users','users.id','passports.created_by')
        ->where('passports.deleted_at',null)
        ->orderBy('passports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','passports.*','users.name')
        ->simplePaginate(10);
        return view('admin.cv.domestic_workers', compact('get_dw_cv'));
    }
    /** 
     * This function searches for domestic workers
    */
    protected function searchDomesticWorker(){
        if(Passport::where('dw_nin', request()->dw_nin)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Domestic worker with this NIN does not Exist');
        }
        $get_dw_cv = DB::table('passports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
        ->join('users','users.id','passports.created_by')
        ->orderBy('passports.created_at','Desc')
        ->where('passports.dw_nin',request()->dw_nin)
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','passports.*','users.name')
        ->simplePaginate(10);
        return view('admin.cv.domestic_workers', compact('get_dw_cv'));
    }
    /** 
     * This function takes to the attachment form for dw cv and passport
    */
    protected function attachDwCVAndPassport($dw_id){
        $attach_dw_documents =DB::table('passports')->where('domestic_worker_id',$dw_id)->get();
        return view('admin.cv.attachment_form',compact('attach_dw_documents'));
    }
    /**
     * this function gets all domestic workers with cvs
     */
    protected function getAllDomesticWorkersWithCVs(){
        $get_domestic_workers_with_cv =DB::table('passports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
        ->simplePaginate(10);
        return view('admin.cv.domestic_workers_with_cvs', compact('get_domestic_workers_with_cv'));
    }

    /**
     * this function gets all domestic workers without CVs
     */
    protected function getAllDomesticWorkersWithOutCv(){
        $get_domestic_workers_without_cv =DB::table('passports')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
        ->where('passports.deleted_at',null)->simplePaginate('10');
        return view('admin.cv.domestic_workers_without_cvs', compact('get_domestic_workers_without_cv'));
    }

    /**
     * this function gets all the domestic workers trashed
     */
    protected function getAllTrashedDomesticWorkers(){
        return view('admin.cv.trashed_dws');
    }
}
