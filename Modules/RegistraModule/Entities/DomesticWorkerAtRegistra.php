<?php

namespace Modules\RegistraModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class DomesticWorkerAtRegistra extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $fillable = ['nationa_id_number','desired_job','parent_names','domestic_worker_at_recieptions_id',
                            'office_or_premedical_fee','deleted_at','passport_status','user_id','education_level',
                             'other_skills','amount_in_words','reason_for_payment'];
    
    protected static function newFactory()
    {
        return \Modules\RegistraModule\Database\factories\DomesticWorkerAtRegistraFactory::new();
    }
}
