<?php

namespace Modules\TrainingModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkerTrainingSchool extends Model
{
    use HasFactory;

    protected $fillable = ['training_school_id','domestic_worker_id','created_by','date_of_allocation'];
    
    protected static function newFactory()
    {
        return \Modules\TrainingModule\Database\factories\WorkerTrainingSchoolFactory::new();
    }
}
