<?php

namespace Modules\CompanyAgents\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CompanyAgents\Entities\CompanyAgent;
use DB;


class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function searchDw()
    {
    if(CompanyAgent::where('agent_nin', request()->agent_nin)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('Agents NIN does not Exist');
    }
        $get_agent_info =DB::table('company_agents')
        ->join('users','users.id','company_agents.created_by')->where('company_agents.deleted_at',null)->orderBy('company_agents.created_at','Desc')
        ->select('users.name','company_agents.*')->where('agent_nin', request()->agent_nin)->simplePaginate(10);
        return view('companyagents::index', compact('get_agent_info'));
    }

    /** 
     * This function searches trashed agents
    */
    protected function searchTrashedAgent(){
        if(CompanyAgent::where('agent_nin', request()->agent_nin)->doesntExist())
    {
        return Redirect()->back()->withInput()->withErrors('Agents NIN does not Exist');
    }
    $trashed_agent = CompanyAgent::onlyTrashed()
    ->where('agent_nin', request()->agent_nin)
    ->simplePaginate(10);
    return view('companyagents::trashed_agent',compact('trashed_agent'));
    }
}
