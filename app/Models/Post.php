<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
        'category_id',
        'user_id',
        'topic_id', // Adicionado o campo topic_id
    ];

    // Relacionamento com o usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relacionamento com os comentários
    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }

    // Relacionamento com a categoria
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'idCategory');
    }

    // Relacionamento com o tópico
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    // Relacionamento com as tags
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag');
    }

    // Acessor para URL da imagem
    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
