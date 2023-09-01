<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['document_id', 'column_name', 'path'];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }
}
