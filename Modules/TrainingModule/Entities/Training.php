<?php

namespace Modules\TrainingModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Training extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $fillable = ['training_performance_report','contract','visa_number','dw_id_worker','created_by'];
    
    protected static function newFactory()
    {
        return \Modules\TrainingModule\Database\factories\TrainingFactory::new();
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
