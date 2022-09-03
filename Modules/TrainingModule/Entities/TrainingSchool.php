<?php

namespace Modules\TrainingModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingSchool extends Model
{
    use HasFactory;

    protected $fillable = ['school_name','location','created_by'];
    
    protected static function newFactory()
    {
        return \Modules\TrainingModule\Database\factories\TrainingSchoolFactory::new();
    }
}
