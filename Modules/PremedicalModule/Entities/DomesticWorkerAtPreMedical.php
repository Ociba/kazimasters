<?php

namespace Modules\PremedicalModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class DomesticWorkerAtPreMedical extends Model
{
    use HasFactory, SoftDeletes, Prunable;
    protected $fillable =['domestic_worker_id','registration_status','premedical_report','issuing_officer','issue'];
    
    protected static function newFactory()
    {
        return \Modules\PremedicalModule\Database\factories\DomesticWorkerAtPreMedicalFactory::new();
    }

    /**
     * Get the prunable model query.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     * needs a command (cron job to run and delete them)
     */
    public function prunable()
    {
        return static::where('created_at', '<=', now()->subMonth());
    }
}
