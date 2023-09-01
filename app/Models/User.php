<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'avatar',
        'sent_documents',
        'approval_status',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scoringDocument()
    {
        return $this->hasMany(ScoringDocument::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function documents(){
        return $this->hasMany(Document::class);
    }
    public function zaiavkas(){
        return $this->hasMany(Zaiavka::class);
    }
    public function documentsRated(){
        return $this->belongsToMany(Document::class)
            ->withPivot('rating')
            ->withTimestamps();
    }
    public function itemsQuant($iscart){
        return $this->belongsToMany(Document::class,'document_type')
            ->wherePivot('iscart', $iscart)
            ->withPivot('quantity', 'iscart', 'kol')
            ->withTimestamps();
    }
    public function docZaiavka($zaiavka){
        return $this->belongsToMany(Document::class,'document_message')
            ->wherePivot('zaiavka', $zaiavka)
            ->withPivot('active', 'name', 'phone', 'email', 'text', 'quantity')
            ->withTimestamps();
    }


    public function role(){
        return $this->belongsTo(Role::class);
    }
}
