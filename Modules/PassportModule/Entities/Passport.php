<?php

namespace Modules\PassportModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Passport extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $fillable = ['dw_nin','parent_nin','nok_nin','recommenders_nin','domestic_worker_id','passport','dw_cv','created_by','training_school_status'];
    
    protected static function newFactory()
    {
        return \Modules\PassportModule\Database\factories\PassportFactory::new();
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
