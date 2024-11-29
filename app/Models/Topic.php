<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Post
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category_id',
        'status',
    ];

    // Relacionamento polimórfico com Post
    public function post()
    {
        return $this->morphOne(Post::class, 'postable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'idCategory');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'topic_tags');
    }
}
