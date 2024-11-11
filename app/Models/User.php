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

    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this -> hasMany(Post::class);
 
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    
    public function rates()
    {
        return $this -> belongsToMany(Post::class);
       
    }

    public function isModerator()
    {
        return $this -> role === 'monerator' ||  $this -> role === 'admin';
       
    }

    public function isAdmin()
    {
        return $this -> role === 'admin';
       
    }
}