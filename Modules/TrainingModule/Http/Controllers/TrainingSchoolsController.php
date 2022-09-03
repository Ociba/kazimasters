<?php

namespace Modules\TrainingModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\TrainingModule\Http\Requests\TrainingSchoolForm;
use Modules\TrainingModule\Http\Requests\WorkerTrainingSchoolForm;
use Modules\TrainingModule\Entities\WorkerTrainingSchool;
use Modules\TrainingModule\Entities\TrainingSchool;
use Modules\PassportModule\Entities\Passport;
use DB;

class TrainingSchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function TrainingSchool()
    {
        $get_all_training_schools=DB::table('training_schools')->join('users','users.id','training_schools.created_by')
        ->select('training_schools.*','users.name')->simplePaginate(10);
        return view('trainingmodule::training_schools', compact('get_all_training_schools'));
    }
    /** 
     * This function gets training school registration form
    */
    protected function addTrainingSchool(){
        return view('trainingmodule::register_training_school');
    }
   /**
     * this function creates  training school
     */
    protected function createTrainingSchool(TrainingSchoolForm $request){
        TrainingSchool::create($request->validated());
        //return to the previous route
        return redirect()->back()->with('msg','operation successful');
    }
    /**
     * This function gets workers to allocate training schools
     */
    public function workersToAllocateTrainingSchs()
    {
        $worker_to_allocate_training_schools =DB::table('passports')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','passports.domestic_worker_id')
        ->join('users','users.id','passports.created_by')
        ->where('passports.deleted_at',null)
        ->where('passports.training_status','pending')
        ->where('passports.training_school_status','not allocated')
        ->orderBy('passports.created_at','Desc')
        ->select('domestic_worker_at_recieptions.*','passports.*','users.name','passports.domestic_worker_id')
        ->simplePaginate();
        return view('trainingmodule::workers_to_allocate_school', compact('worker_to_allocate_training_schools'));
    }

    /**
     * This function gets form to allocate workers to training schools.
     * @param int $id
     * @return Renderable
     */
    public function registerWorkersToTrainigSchool($dw_id)
    {
        $get_taining_schools=DB::table('training_schools')->select('id','school_name')->get();
        return view('trainingmodule::allocate_school_form',compact('get_taining_schools','dw_id'));
    }

    /**
     * Create workers training school information.
     * @param int $id
     * @return Renderable
     */
    public function createTrainingSchoolInfo(WorkerTrainingSchoolForm $request)
    {
        $dw_id = $request->domestic_worker_id;
        //save the validated model
        WorkerTrainingSchool::create($request->validated());
        //update the training school status
        Passport::where('domestic_worker_id',request()->domestic_worker_id)->update(array('training_school_status'=>'allocated'));
        //return back to the previous route
        return redirect()->back()->with('msg','operation successful');
    }

    /**
     * View trainig schools where workers have been allocated.
     */
    public function WorkersAndTrainingSchool()
    {
      $get_all_training_schools =DB::table('worker_training_schools')
      ->join('users','users.id','worker_training_schools.created_by')
      ->join('training_schools','training_schools.id','worker_training_schools.training_school_id')
      ->select('training_schools.*')
      ->distinct('school_name')->simplePaginate(10);
    return view('trainingmodule::allocated_training_schools', compact('get_all_training_schools'));
    }

    /**
     * This function gets all workers allocated to a particular school.
     */
    public function allWorkersAllocated($id)
    {
    $get_all_training_school_workers =DB::table('worker_training_schools')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','worker_training_schools.domestic_worker_id')
      ->join('users','users.id','worker_training_schools.created_by')
      ->join('training_schools','training_schools.id','worker_training_schools.training_school_id')
      ->where('worker_training_schools.status','available')
      ->where('worker_training_schools.training_school_id',$id)
      ->select('domestic_worker_at_recieptions.*','worker_training_schools.domestic_worker_id')->simplePaginate(10);
    return view('trainingmodule::workers_allocated_to_training_school', compact('get_all_training_school_workers'));
    }
     /**
     * This function gets all workers allocated to a particular school to be printed.
     */
    public function printAllWorkersAllocated($id)
    {
    $get_all_training_school_workers =DB::table('worker_training_schools')->join('domestic_worker_at_recieptions','domestic_worker_at_recieptions.id','worker_training_schools.domestic_worker_id')
      ->join('users','users.id','worker_training_schools.created_by')
      ->join('training_schools','training_schools.id','worker_training_schools.training_school_id')
      ->where('worker_training_schools.status','available')
      ->where('worker_training_schools.training_school_id',$id)
      ->select('domestic_worker_at_recieptions.*')->simplePaginate(10);
      $get_schoo_name =DB::table('training_schools')->where('training_schools.id',$id)->value('school_name');
    return view('trainingmodule::print_workers_allocated_to_training_school', compact('get_all_training_school_workers','get_schoo_name'));
    }
    /**
     * This function marks allocated workers sent for training
     */
    public function markAsSentForTraining($id){
        WorkerTrainingSchool::where('worker_training_schools.domestic_worker_id',$id)->update(array('status'=>'sent'));
        return redirect()->back()->with('msg','operation successful');
    }
}
