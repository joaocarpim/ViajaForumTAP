<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    // Campos permitidos para atribuição em massa
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo', // Foto de perfil do usuário
        'role',  // Papel do usuário (ex: admin, moderator, user)
    ];

    // Campos ocultos ao serializar
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Tipos de dados para atributos
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relacionamento com posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Relacionamento com comentários
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relacionamento de avaliações (ratings) com posts
    public function rates()
    {
        return $this->belongsToMany(Post::class, 'post_user_rates', 'user_id', 'post_id') // Supondo tabela pivô chamada `post_user_rates`
                    ->withPivot('rating'); // Supondo que exista uma coluna `rating` na tabela pivô
    }

    // Verifica se o usuário é um moderador ou administrador
    public function isModerator()
    {
        return $this->role === 'moderator' || $this->role === 'admin';
    }

    // Verifica se o usuário é um administrador
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
