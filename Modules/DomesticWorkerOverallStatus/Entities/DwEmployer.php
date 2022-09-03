<?php

namespace Modules\DomesticWorkerOverallStatus\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DwEmployer extends Model
{
    use HasFactory;

    protected $fillable = ['domestic_worker_id','visa','company_id','employer_name','employer_contact','created_by','status'];
    
    protected static function newFactory()
    {
        return \Modules\DomesticWorkerOverallStatus\Database\factories\DwEmployerFactory::new();
    }
}
