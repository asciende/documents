<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workflow extends Model
{
    /** @use HasFactory<\Database\Factories\WorkflowFactory> */
    use HasFactory;

    protected $fillable = ['name','description','scope','is_active'];

    public function clients()
    {
        //return $this->belongsToMany(Client::class);
        return $this->belongsToMany(Client::class)->withTimestamps();
    }

    public function steps()
    {
        return $this->hasMany(WorkflowStep::class);
    }
    public function options()
    {
        return $this->hasMany(WorkflowOption::class);
    }

}
