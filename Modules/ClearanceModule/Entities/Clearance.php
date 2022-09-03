<?php

namespace Modules\ClearanceModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clearance extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $fillable = ['clearance_for_contract','clearance_for_medical','clearance_for_interpol','passport_bio_data',
    'ministry_clearance_letter','gcc','domestic_worker_id','training_report','ticket','yellow_book'
    ,'covid','departure_medical','created_by'];
    
    protected static function newFactory()
    {
        return \Modules\ClearanceModule\Database\factories\ClearanceFactory::new();
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
