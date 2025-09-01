<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientWorkflow extends Model
{
    protected $fillable = [
        'client_id',
        'workflow_id',
        'is_active',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function workflow()
    {
        return $this->belongsTo(Workflow::class);
    }
}
