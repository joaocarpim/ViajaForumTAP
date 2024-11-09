<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description'
    ];

    // Adicionando a chave primária correta
    protected $primaryKey = 'idCategory';  // Defina 'idCategory' como a chave primária

    public function topics()
    {
        return $this->hasMany(Topic::class);
    }
}
