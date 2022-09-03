<?php

namespace Modules\PassportModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProcessPassport extends Model
{
    use HasFactory;

    protected $fillable = ['domestic_worker_id','amount','particulars','remarks','created_by'];
    
    protected static function newFactory()
    {
        return \Modules\PassportModule\Database\factories\ProcessPassportFactory::new();
    }
}
