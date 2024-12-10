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

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'idCategory');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'topic_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'topic_tags');
    }



public function posts()
{
    return $this->hasMany(Post::class, 'topic_id'); 
}

}
