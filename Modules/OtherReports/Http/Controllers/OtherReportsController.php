<?php

namespace Modules\OtherReports\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\OtherReports\Http\Requests\OtherReportFormRequest;
use Modules\OtherReports\Entities\OtherReport;
use Modules\TrainingModule\Entities\Training;
use DB;

class OtherReportsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $get_dw =DB::table('trainings')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
        ->join('users','users.id','trainings.created_by')
        ->orderBy('trainings.created_at','Desc')
        ->where('trainings.deleted_at',null)
        ->where('trainings.other_reports_status','pending')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','trainings.*','users.name')
        ->simplePaginate(10);
        return view('otherreports::index', compact('get_dw'));
    }

    /**
     * this function takes to the form of other reports a dw
     */
    protected function clearDwForm($dw_id){
        return view('otherreports::clear_dw',compact('dw_id'));
    }
       /**
     * this function saves the domestic workers visa passport
     */
    private function saveDWVcsPassportPayment($dw_id){
        $dw_visa_passport = request()->vcs_passport_payment;
        $dw_visa_passport_original = $dw_visa_passport->getClientOriginalName();
        $dw_visa_passport->move('dw_vcs_passport_payment/',$dw_visa_passport_original);
        return $dw_visa_passport_original;
    }
      /**
     * this function saves the domestic workers gcc payment
     */
    private function saveDWGccPayment($dw_id){
        $dw_gcc_payment = request()->gcc_payment;
        $dw_gcc_payment_original = $dw_gcc_payment->getClientOriginalName();
        $dw_gcc_payment->move('dw_gcc_payment/',$dw_gcc_payment_original);
        return $dw_gcc_payment_original;
    }
     /**
     * this function saves the domestic workers visa attachment
     */
    private function saveDWVisaAttachment($dw_id){
        $dw_visa_attachment = request()->visa_attachment;
        $dw_visa_attachment_original = $dw_visa_attachment->getClientOriginalName();
        $dw_visa_attachment->move('dw_visa_attachment/',$dw_visa_attachment_original);
        return $dw_visa_attachment_original;
    }
      /**
     * this function saves the domestic workers ticket copy
     */
    private function saveDWTicketCopy($dw_id){
        $dw_ticket_copy = request()->ticket_copy;
        $dw_ticket_copy_original = $dw_ticket_copy->getClientOriginalName();
        $dw_ticket_copy->move('dw_ticket_copy/',$dw_ticket_copy_original);
        return $dw_ticket_copy_original;
    }
       /**
     * this function saves the domestic workers passport copy
     */
    private function saveDWPassportCopy($dw_id){
        $dw_passport_copy = request()->passport_copy;
        $dw_passport_copy_original = $dw_passport_copy->getClientOriginalName();
        $dw_passport_copy->move('dw_passport_copy/',$dw_passport_copy_original);
        return $dw_passport_copy_original;
    }
    /**
     * this function saves the domestic workers passport copy
    */
    private function saveDWPcrTestResult($dw_id){
        $dw_pcr_test_result = request()->pcr_test_result;
        $dw_pcr_test_result_original = $dw_pcr_test_result->getClientOriginalName();
        $dw_pcr_test_result->move('dw_dw_pcr_test_result/',$dw_pcr_test_result_original);
        return $dw_pcr_test_result_original;
    }
    /**
     * this function saves the domestic workers ministry clearance letter
    */
    private function saveDWMinistryClearance($dw_id){
        $dw_ministry_clearance_letter = request()->ministry_clearance_letter;
        $dw_ministry_clearance_letter_original = $dw_ministry_clearance_letter->getClientOriginalName();
        $dw_ministry_clearance_letter->move('dw_ministry_clearance_letter/',$dw_ministry_clearance_letter_original);
        return $dw_ministry_clearance_letter_original;
    }
     /**
     * this function saves the domestic workers yellow fever book
    */
    private function saveDWYelloBook($dw_id){
        $dw_yellow_book = request()->yellow_book;
        $dw_yellow_book_original = $dw_yellow_book->getClientOriginalName();
        $dw_yellow_book->move('dw_yellow_book/',$dw_yellow_book_original);
        return $dw_yellow_book_original;
    }
    /**
     * this function saves the domestic workers covid
    */
    private function saveDWCovid($dw_id){
        $dw_covid = request()->covid;
        $dw_covid_original = $dw_covid->getClientOriginalName();
        $dw_covid->move('dw_covid/',$dw_covid_original);
        return $dw_covid_original;
    }
    /**
     * this function saves the domestic workers training Certificate
    */
    private function saveDWTrainingCertificate($dw_id){
        $dw_training_certificate = request()->training_certificate;
        $dw_training_certificate_original = $dw_training_certificate->getClientOriginalName();
        $dw_training_certificate->move('dw_training_certificate/',$dw_training_certificate_original);
        return $dw_training_certificate_original;
    }
     /**
     * this function saves the domestic workers departure Medical
    */
    private function saveDWDeparturePremedical($dw_id){
        $dw_departure_medical = request()->departure_medical;
        $dw_departure_medical_original = $dw_departure_medical->getClientOriginalName();
        $dw_departure_medical->move('dw_departure_medical/',$dw_departure_medical_original);
        return $dw_departure_medical_original;
    }
    /**
     * this function records the other reports details for a domestic worker
     * it takes the id of the domestic worker
     */
    protected function recordDWOtherReportsDetails(OtherReportFormRequest $request){
        $dw_id = $request->dw_at_other_reports_level_id;
        //save the validated model
        OtherReport::create($request->validated());
        //This function  updates what is being saved
        OtherReport::where('dw_at_other_reports_level_id',$dw_id)->update(array(
            'vcs_passport_payment'=>$this->saveDWVcsPassportPayment($dw_id),
            'gcc_payment'=>$this->saveDWGccPayment($dw_id),
            'visa_attachment'=>$this->saveDWVisaAttachment($dw_id),
            'ticket_copy'=>$this->saveDWTicketCopy($dw_id),
            'passport_copy'=>$this->saveDWPassportCopy($dw_id),
            'pcr_test_result'=>$this->saveDWPcrTestResult($dw_id),
            'ministry_clearance_letter'=>$this->saveDWMinistryClearance($dw_id),
            'yellow_book'=>$this->saveDWYelloBook($dw_id),
            'covid'=>$this->saveDWCovid($dw_id),
            'training_certificate'=>$this->saveDWTrainingCertificate($dw_id),
            'departure_medical'=>$this->saveDWDeparturePremedical($dw_id)
        ));
        //update passports training staus
        Training::where('dw_id_worker',request()->dw_at_other_reports_level_id)->update(array('other_reports_status'=>'successful'));
        //return back to the previous route
        return redirect()->back()->with('msg', 'Operation Successfull');
    }

    /**
     * this function takes to the form for editing the dw at the other reports level
     */
    protected function editDwAtOtherReports($dw_id){
        $dw_info = OtherReport::where('dw_at_other_reports_level_id',$dw_id)->get();
        return view('otherreports::edit_dw_info',compact('dw_info'));
    }

    /**
     * this function updates the info of a domestic worker at the other reports level
     */
    protected function updateDomesticWorkerInfo($dw_id, OtherReportFormRequest $request){
        OtherReport::where('dw_at_other_reports_level_id',$dw_id)->update($request->validated());
        //return to the previous route
        return redirect()->back()->with('msg', 'Operation Successfull');
    }

    /**
     * this function does a soft delete to a domestic worker at the other reports level
     */
    protected function deleteDwOtherReportsLevel(){
        $dw_id = request()->delete_dw;
        OtherReport::where('dw_at_other_reports_level_id',$dw_id)->delete();
        //return to the previous route
        return redirect()->back()->with('msg','Operation Successfull');
    }

    /**
     * this function restores the info of a deleted domestic worker
     */
    protected function restoreDeletedDw($dw_id){
        OtherReport::where('dw_at_other_reports_level_id',$dw_id)->restore();
        //return to the previous route
        return redirect()->back()->with('msg', 'Operation Successfull');
    }

    /**
     * this function gets the trashed domestic workers at the other reports level
     */
    protected function showTrash(){
        $trashed_dws = OtherReport::join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','other_reports.dw_at_other_reports_level_id')
        ->join('users','users.id','other_reports.created_by')
        ->orderBy('other_reports.updated_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','other_reports.*','users.name')
        ->onlyTrashed()->simplePaginate(10);
        return view('otherreports::trashed_dw',compact('trashed_dws'));
    }

    /**
     * this function deletes the domestic worker from trash
     */
    protected function parmanetlyDeleteDW(){
        $dw_id = request()->delete_dw;
        OtherReport::where('dw_at_other_reports_level_id',$dw_id)->forceDelete();
        //return to previous route
        return redirect()->back()->with('msg', 'Operation Successfull');
    }
    /**
     * this function gets dws with vcs payment
     */
    protected function getPendingDwDocuments(){
        $get_dw =DB::table('trainings')
        ->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','trainings.dw_id_worker')
        ->join('users','users.id','trainings.created_by')
        ->orderBy('trainings.created_at','Desc')
        ->where('trainings.deleted_at',null)
        ->where('trainings.other_reports_status','pending')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name','domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','trainings.*','users.name')
        ->simplePaginate(10);
        return view('otherreports::pending',compact('get_dw'));
    }
     /**
     * this function gets the successful dw
     */
    protected function successfulDW(){
        $get_cleared_dw =OtherReport::join('domestic_worker_at_recieptions','other_reports.dw_at_other_reports_level_id','domestic_worker_at_recieptions.id')
        ->where('other_reports.deleted_at',null)->join('users','users.id','other_reports.created_by')
        ->orderBy('other_reports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','other_reports.*','users.name')
        ->simplePaginate(10);
        return view('otherreports::successful_dw', compact('get_cleared_dw'));
    }
    /** 
     * This function gets print page
    */
    protected function printOtherReports(){
        $get_cleared_dw =OtherReport::join('domestic_worker_at_recieptions','other_reports.dw_at_other_reports_level_id','domestic_worker_at_recieptions.id')
        ->where('other_reports.deleted_at',null)->join('users','users.id','other_reports.created_by')
        ->orderBy('other_reports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
        'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','other_reports.*','users.name')
        ->simplePaginate(10);
        return view('otherreports::print_page', compact('get_cleared_dw')); 
    }
   /** 
    * This function gets all the workers information
   */
  protected function moreWorkersInformation($dw_id){
    $get_all_cleared_dw =OtherReport::join('domestic_worker_at_recieptions','other_reports.dw_at_other_reports_level_id','domestic_worker_at_recieptions.id')
    ->where('other_reports.deleted_at',null)->join('users','users.id','other_reports.created_by')
    ->orderBy('other_reports.created_at','Desc')
    ->where('other_reports.dw_at_other_reports_level_id',$dw_id)
    ->select('domestic_worker_at_recieptions.dw_last_name','domestic_worker_at_recieptions.dw_first_name','domestic_worker_at_recieptions.dw_other_name',
    'domestic_worker_at_recieptions.dw_contact','domestic_worker_at_recieptions.nok_contact','other_reports.*','users.name')
    ->simplePaginate(10);
    return view('otherreports::more_workers_information', compact('get_all_cleared_dw'));
  }
}
