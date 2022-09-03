<?php

namespace Modules\RecieptionModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
            return Redirect()->back()->withInput()->withErrors('DW Contact does not Exist');
        }
        $get_all_domestic_workers =DB::table('domestic_worker_at_recieptions')->join('users','users.id','domestic_worker_at_recieptions.created_by')
        ->where('domestic_worker_at_recieptions.deleted_at',null)
        ->where('domestic_worker_at_recieptions.dw_contact',request()->dw_contact)
        ->select('users.name','domestic_worker_at_recieptions.*')->simplePaginate('10');
        return view('recieptionmodule::all_dws', compact('get_all_domestic_workers'));
    }
}
