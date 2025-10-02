<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory;

    protected $fillable = ['client_id','document_type_id','external_id','identifier','version','data'];

    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }


    protected $casts = [
        'identifier' => 'array',  // Esto convierte el JSON en un array automáticamente al acceder a $document->identifier
        'data' => 'array',  // Esto convierte el JSON en un array automáticamente al acceder a $document->data
    ];

    // public function clients()
    // {
    //     //return $this->belongsToMany(Client::class);
    //     return $this->belongsToMany(Client::class)->withTimestamps();
    // }


}
