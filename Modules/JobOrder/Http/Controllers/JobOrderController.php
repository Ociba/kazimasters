<?php

namespace Modules\JobOrder\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\JobOrder\Http\Requests\OrderRequestForm;
use Modules\JobOrder\Entities\JobOrder;
use DB;

class JobOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected function index()
    {
        $get_companies =DB::table('abroad_companies')
        ->where('deleted_at',null)->orderBy('created_at','Desc')->simplePaginate();
        return view('joborder::index',compact('get_companies'));
    }
    /** 
     * This function gets all joborders for a particular abroad company
    */
    protected function jobOrders($company_id)
    {
        $get_order =DB::table('job_orders')->where('deleted_at',null)->orderBy('job_orders.created_at','Desc')->where('abroadcompany_id',$company_id)->simplePaginate();
        //calculate actual amount deposited
        $get_sum_of_actual_amount =DB::table('job_orders')->where('abroadcompany_id',$company_id)->sum('amount_deposited');
         //calculate expected amount
         $get_sum_of_expected_amount =DB::table('job_orders')->where('abroadcompany_id',$company_id)->sum('total_amount');
        return view('joborder::orders',compact('get_order','get_sum_of_actual_amount','get_sum_of_expected_amount'));
    }
    /** 
     * This function prints job orders details
    */
    protected function printJobOrders($company_id){
        $get_order =DB::table('job_orders')->join('abroad_companies','abroad_companies.id','job_orders.abroadcompany_id')
        ->where('job_orders.deleted_at',null)->orderBy('job_orders.created_at','Desc')
        ->where('job_orders.abroadcompany_id',$company_id)->get(['abroad_companies.name','job_orders.*']);
        //calculate actual amount deposited
        $get_sum_of_actual_amount =DB::table('job_orders')->where('abroadcompany_id',$company_id)->sum('amount_deposited');
        //calculate expected amount
        $get_sum_of_expected_amount =DB::table('job_orders')->where('abroadcompany_id',$company_id)->sum('total_amount');
        return view('joborder::print_job_orders',compact('get_order','get_sum_of_actual_amount','get_sum_of_expected_amount'));
    }
     /** 
      * This function gets form for adding job order
     */
    protected function jobOrderForm($company_id){

        return view('joborder::job_order_form', compact('company_id'));
    }
    /**
     * This function saves the job order details.
     */
    protected function createJobOrder(OrderRequestForm $request)
    {
        
        //save the validated model
        JobOrder::create($request->validated());
         
        //return back to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }
    /** 
     * This fuction gets job order edit form
     * edits particular job order
    */
    protected function editJobOrder($order_id){
        $get_job_order_form =JobOrder::where('id',$order_id)->get();
        return view('joborder::edit_job_order', compact('get_job_order_form'));
    }
    /**
     * this function updates the info of job order
     */
    protected function updateJobAbroad($order_id, OrderRequestForm $request){
        JobOrder::where('id',$order_id)->update($request->validated());
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }
    /**
     * this function does a soft delete to job order
     */
    protected function deleteJobOrder(){
        $order_id = request()->delete_order;
        JobOrder::where('id',$order_id)->delete();
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }

    /**
     * this function restores the info of a deleted job order
     */
    protected function restoreDeletedJobOrder($order_id){
        JobOrder::where('id',$order_id)->restore();
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successful');
    }
    /**
     * Show the trashed job order.
     * @param int $id
     * @return Renderable
     */
    protected function showTrash()
    {
        $trashed_job_order =JobOrder::onlyTrashed()->orderBy('updated_at','Desc')->simplePaginate(10);
        return view('joborder::trashed_job_order', compact('trashed_job_order'));
    }

    /**
     * This function deletes job order permanently
     * @param int $id
     * @return Renderable
     */
    protected function deletJobOrderPermanently()
    {
        $order_id = request()->delete_order;
        JobOrder::where('id',$order_id)->forceDelete();
        //return to previous route
        return redirect()->back()->with('msg','Operation Successful');
    }
    /** 
     * This function displays form to attach proof of payment
    */
    protected function attachProofOfPayment($order_id){
       return view('joborder::attach_proof_of_payment_form', compact('order_id'));
    }
    /** 
     * This function saves proof of payment to folder
    */
    private function saveProofOfPayment(){
        $proof_of_payment =request()->proof_of_payment;
        $proof_of_payment_original =$proof_of_payment->getClientOriginalName();
        $proof_of_payment->move('job_order_proof/',$proof_of_payment_original);
        return $proof_of_payment_original;
    }
    /** 
     * This function attaches payment proof
    */
    protected function attachPaymentProof($order_id,OrderRequestForm $request){
        //This function  updates what is being saved
        JobOrder::where('id',$order_id)->update(array(
            'proof_of_payment'=>$this->saveProofOfPayment($order_id),
        ));
        return redirect()->back()->with('msg','Operation Successful');
    }
}
