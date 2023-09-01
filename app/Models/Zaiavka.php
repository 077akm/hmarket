<?php

namespace App\Models;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zaiavka extends Model
{
    use HasFactory;

    protected $table = 'document_message';

    protected $fillable = ['name', 'email','phone','text', 'user_id', 'active'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function condition(){
        return $this->belongsTo(Condition::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function usersRated(){
        return $this->belongsToMany(User::class, 'item_user')
            ->withPivot('rating')
            ->withTimestamps();
    }
    public function usersQuant(){
        return $this->belongsToMany(User::class,'document_type')
            ->withPivot('quantity','iscart')
            ->withTimestamps();
    }

    public function document(){
        return $this->belongsTo(Document::class);
    }


}
