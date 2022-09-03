<?php

namespace Modules\JobOrder\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobOrder extends Model
{
    use HasFactory,SoftDeletes, Prunable;

    protected $fillable = ['number_of_dws_required','number_of_dws_taken','amount_deposited','total_amount','abroadcompany_id','proof_of_payment'];
    
    protected static function newFactory()
    {
        return \Modules\JobOrder\Database\factories\JobOrderFactory::new();
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
