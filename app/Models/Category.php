<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'code', 'name_en', 'name_kz', 'name_ru'];

    public function items(){

        return $this->hasMany(Document::class);
    }


}
