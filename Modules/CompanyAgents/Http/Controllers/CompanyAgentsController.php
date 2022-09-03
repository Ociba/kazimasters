<?php

namespace Modules\CompanyAgents\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\CompanyAgents\Http\Requests\CompanyAgentsFormRequest;
use Modules\CompanyAgents\Entities\CompanyAgent;
use DB;

class CompanyAgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $get_agent_info =DB::table('company_agents')
        ->join('users','users.id','company_agents.created_by')->where('company_agents.deleted_at',null)->orderBy('company_agents.created_at','Desc')
        ->select('users.name','company_agents.*')->simplePaginate(10);
        return view('companyagents::index', compact('get_agent_info'));
    }
    /** 
     * This function prints agents information
    */
    protected function printAgentDetails(){
        $get_agent_info =DB::table('company_agents')
        ->join('users','users.id','company_agents.created_by')->where('company_agents.deleted_at',null)->orderBy('company_agents.created_at','Desc')
        ->select('users.name','company_agents.*')->get(10);
        return view('companyagents::print_company_agents', compact('get_agent_info'));
    }
     /** 
      * This function gets all dw bought by company agent
     */
    public function CompanyAgentDw($agent_id)
    {
        $get_dw_for_this_agent =DB::table('domestic_worker_at_recieptions')->join('company_agents','company_agents.id','domestic_worker_at_recieptions.agent_id')
        ->join('users','users.id','domestic_worker_at_recieptions.created_by')
        ->where('domestic_worker_at_recieptions.deleted_at',null)
        ->where('domestic_worker_at_recieptions.agent_id',$agent_id)
        ->orderBy('company_agents.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','users.name','company_agents.last_name','company_agents.first_name','company_agents.other_names'
        ,'company_agents.phone_number')
        ->simplePaginate(10);
        $total_number_dw_for_this_agent=DB::table('domestic_worker_at_recieptions')
        ->where('domestic_worker_at_recieptions.deleted_at',null)
        ->where('domestic_worker_at_recieptions.agent_id',$agent_id)->count();
        return view('companyagents::agent_dw', compact('get_dw_for_this_agent','total_number_dw_for_this_agent'));
    }
    /**
     * this function takes to the form of registering a agent
     */
    protected function registerCompanyAgentForm(){
        return view('companyagents::register_agent');
    }

    /**
     * this function records the company agent
     * it takes the id of the domestic worker
     */
    protected function recordAgentCompanyAgentDetails(CompanyAgentsFormRequest $request){
        //save the validated model
        CompanyAgent::create($request->validated());
        //return back to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }

    /**
     * this function takes to the form for editing the agent
     */
    protected function editCompanyAgent($agent_id){
        $agent_info = CompanyAgent::where('id',$agent_id)->get();
        return view('companyagents::edit_agent_info',compact('agent_info'));
    }

    /**
     * this function updates the info of agent
     */
    protected function updateDomesticWorkerInfo($agent_id, CompanyAgentsFormRequest $request){
        CompanyAgent::where('id',$agent_id)->update($request->validated());
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }

    /**
     * this function does a soft delete to agent
     */
    protected function deleteCompanyAgentCompanyAgentLevel(){
        $agent_id = request()->delete_agent;
        CompanyAgent::where('id',$agent_id)->delete();
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }

    /**
     * this function restores the info of a deleted domestic worker
     */
    protected function restoreDeletedCompanyAgent($agent_id){
        CompanyAgent::where('id',$agent_id)->restore();
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }

    /**
     * this function gets the trashed domestic workers at the passport level
     */
    protected function showTrash(){
        $trashed_agent = CompanyAgent::join('users','users.id','company_agents.created_by')
        ->select('company_agents.*','users.name')->onlyTrashed()->simplePaginate(10);
        return view('companyagents::trashed_agent',compact('trashed_agent'));
    }

    /**
     * this function deletes the domestic worker from trash
     */
    protected function parmanetlyDeleteAgent(){
        $agent_id = request()->delete_agent;
        CompanyAgent::where('id',$agent_id)->forceDelete();
        //return to previous route
        return redirect()->back()->with('msg','Operation Successful');
    }
}
