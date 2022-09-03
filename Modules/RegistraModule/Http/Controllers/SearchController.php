<?php

namespace Modules\RegistraModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\RecieptionModule\Entities\DomesticWorkerAtRecieption;
use Modules\RegistraModule\Entities\DomesticWorkerAtRegistra;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected function searchPendingDW()
    {
        if(DomesticWorkerAtRecieption::where('dw_contact', request()->dw_contact)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Domestic worker Contact does not Exist');
        }
        $get_pending_dw = DB::table('domestic_worker_at_pre_medicals')->join('users','users.id','domestic_worker_at_pre_medicals.issuing_officer')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_pre_medicals.domestic_worker_id')
        ->where('domestic_worker_at_pre_medicals.deleted_at',null)->where('registration_status','pending')->where('domestic_worker_at_pre_medicals.premedical_report','fit')
        ->orderBy('domestic_worker_at_pre_medicals.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','users.name','domestic_worker_at_pre_medicals.*',
          'domestic_worker_at_pre_medicals.domestic_worker_id')->where('domestic_worker_at_recieptions.dw_contact',request()->dw_contact)->simplePaginate(10);
        return view('registramodule::pending', compact('get_pending_dw'));
    }

    protected function searchAllDW()
    {
        if(DomesticWorkerAtRecieption::where('dw_contact', request()->dw_contact)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Domestic worker contact does not exist');
        }
        $domestic_workers = DB::table('domestic_worker_at_pre_medicals')->join('users','users.id','domestic_worker_at_pre_medicals.issuing_officer')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_pre_medicals.domestic_worker_id')
        ->where('domestic_worker_at_pre_medicals.deleted_at',null)->orderBy('domestic_worker_at_pre_medicals.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','users.name','domestic_worker_at_pre_medicals.*')
        ->where('domestic_worker_at_recieptions.dw_contact',request()->dw_contact)->simplePaginate(10);
        return view('registramodule::index',compact('domestic_workers'));
    }
     /** 
     * This function searches for domestic worker in Trash
    */
    protected function searchTrashedDW(){
        if(DomesticWorkerAtRegistra::where('nationa_id_number', request()->nationa_id_number)->doesntExist())
        {
            return Redirect()->back()->withInput()->withErrors('Domestic worker with this NIN Number does not Exist, Please check the Number Properly');
        } 
        $trashed_dw = DomesticWorkerAtRegistra::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','domestic_worker_at_registras.domestic_worker_at_recieptions_id')
        ->onlyTrashed()->orderBy('domestic_worker_at_registras.created_at','Desc')
        ->where('domestic_worker_at_registras.nationa_id_number',request()->nationa_id_number)
        ->simplePaginate('10');
        return view('registramodule::trashed_dw',compact('trashed_dw'));
            
        }
}
