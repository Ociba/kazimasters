<?php

namespace Modules\OtherReports\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtherReport extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $fillable = ['dw_at_other_reports_level_id','vcs_passport_payment','gcc_payment','visa_attachment','ticket_copy',
                           'passport_copy','pcr_test_result','created_by','ministry_clearance_letter','yellow_book','covid',
                           'departure_medical','training_certificate'];
    
    protected static function newFactory()
    {
        return \Modules\OtherReports\Database\factories\OtherReportFactory::new();
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
