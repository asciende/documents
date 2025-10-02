<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Client extends Model
{
    /** @use HasFactory<\Database\Factories\ClientFactory> */
    use HasFactory, HasApiTokens;

    protected $fillable = ['name','email','is_active'];
    protected $hidden = ['id','password','remember_token' ];

    public function workflows()
    {
        return $this->belongsToMany(Workflow::class);
    }

    public function documentTypes()
    {
        return $this->belongsToMany(DocumentType::class);
    }
}

