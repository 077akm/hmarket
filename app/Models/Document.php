<?php

namespace App\Models;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Document extends Model
{
    use HasFactory;

//    protected $fillable = ['name', 'number','PKB-otchet','Zeinet Aqy', 'Neke anyktama', 'Bala tizimi', 'Kualik'];
    protected $guarded = [ ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function scoringDocument()
    {
        return $this->hasOne(ScoringDocument::class);
    }

    public function pkbFiles()
    {
        return $this->hasMany(File::class)->where('column_name', 'PKB_otchet');
    }

    public function zeinetFiles()
    {
        return $this->hasMany(File::class)->where('column_name', 'Zeinet_Aqy');
    }
    public function nekeFiles()
    {
        return $this->hasMany(File::class)->where('column_name', 'Neke_anyktama');
    }

    public function balaFiles()
    {
        return $this->hasMany(File::class)->where('column_name', 'Bala_tizimi');
    }
    public function kualikFiles()
    {
        return $this->hasMany(File::class)->where('column_name', 'Kualik');
    }



    public function user(){
        return $this->belongsTo(User::class);
    }
    public function usersRated(){
        return $this->belongsToMany(User::class, 'document_user')
            ->withPivot('rating')
            ->withTimestamps();
    }
    public function usersQuant(){
        return $this->belongsToMany(User::class,'document_type')
            ->withPivot('quantity','iscart')
            ->withTimestamps();
    }


}
