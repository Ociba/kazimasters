<?php

namespace Modules\AbroadCompany\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\AbroadCompany\Http\Requests\AbroadCompanyRequestForm;
use Modules\AbroadCompany\Entities\AbroadCompany;
use DB;

class AbroadCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected function index()
    {
        $get_abroad_companies =DB::table('abroad_companies')->where('deleted_at',null)->orderBy('created_at','Desc')->simplePaginate(10);
        return view('abroadcompany::index',compact('get_abroad_companies'));
    }
    /** 
     * This function gets Abroad company registration form
    */
    protected function addAbroadCompany(){
        return view('abroadcompany::add_abroadcompany_form');
    }
     /**
     * this function save the abroad company details
     */
    protected function createAbroadCompany(AbroadCompanyRequestForm $request){
        //save the validated model
        AbroadCompany::create($request->validated());
        //return back to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }
    /**
     * this function takes to the form for editing the abroad company
     */
    protected function editAbroadCompany($company_id){
        $company_info = AbroadCompany::where('id',$company_id)->get();
        return view('abroadcompany::edit_abroadcompany_info',compact('company_info'));
    }

     /**
     * this function updates the info of abroad company 
     */
    protected function updateAbroadCompany($company_id, AbroadCompanyRequestForm $request){
        AbroadCompany::where('id',$company_id)->update($request->validated());
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }
    /**
     * this function does a soft delete to abroad company
     */
    protected function deleteAbroadCompany(){
        $company_id = request()->delete_company;
        AbroadCompany::where('id',$company_id)->delete();
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }

    /**
     * this function restores the info of a deleted abroad company
     */
    protected function restoreDeletedAbroadCompany($company_id){
        AbroadCompany::where('id',$company_id)->restore();
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    protected function showTrash()
    {
        $trashed_abroad_company =AbroadCompany::onlyTrashed()->simplePaginate(10);
        return view('abroadcompany::trashed_abroad_company', compact('trashed_abroad_company'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    protected function deleteAbroadCompanyPermanently()
    {
        $company_id = request()->delete_company;
        AbroadCompany::where('id',$company_id)->forceDelete();
        //return to previous route
        return redirect()->back()->with('msg','Operation Successful');
    }
}
