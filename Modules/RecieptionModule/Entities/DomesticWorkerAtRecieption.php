<?php

namespace Modules\RecieptionModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class DomesticWorkerAtRecieption extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $fillable = ['dw_first_name','dw_last_name','dw_other_name','reason_for_coming','created_by','premedical_status',
                          'gender','dw_contact','dw_location','next_of_kin','nok_contact','passport_number','agent_id','photo'];
    
    protected static function newFactory()
    {
        return \Modules\RecieptionModule\Database\factories\DomesticWorkerAtRecieptionFactory::new();
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
