<?php

namespace Modules\AbroadCompany\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Database\Eloquent\SoftDeletes;

class AbroadCompany extends Model
{
    use HasFactory,SoftDeletes, Prunable;

    protected $fillable = ['name'];
    
    protected static function newFactory()
    {
        return \Modules\AbroadCompany\Database\factories\AbroadCompanyFactory::new();
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
