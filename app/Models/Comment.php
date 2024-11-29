<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // Nome da tabela (opcional, apenas se for diferente de "comments")
    protected $table = 'comments';

    // Campos permitidos para atribuição em massa
    protected $fillable = [
        'content',
        'topic_id',
        'user_id', // Supondo que os comentários são feitos por usuários
    ];

    // Relacionamento com tópicos
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

    // Relacionamento com usuários
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
