<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkflowStep extends Model
{
    protected $fillable = [
        'workflow_id',
        'name',
        'description',
        'order',
        'action',
        'verb',
        'target',
        'is_active',
    ];

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }
   
}
