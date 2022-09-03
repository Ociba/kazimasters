<?php

namespace Modules\CompanyAgents\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Prunable;

class CompanyAgent extends Model
{
    use HasFactory, SoftDeletes, Prunable;

    protected $fillable = ['first_name','last_name','other_names','agent_nin','phone_number','created_by'];
    
    protected static function newFactory()
    {
        return \Modules\CompanyAgents\Database\factories\CompanyAgentFactory::new();
    }
}
