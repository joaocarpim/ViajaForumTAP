<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Criar a tabela posts
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Chave primária
            $table->unsignedBigInteger('user_id'); // Relacionamento com o usuário
            $table->unsignedBigInteger('category_id'); // Relacionamento com a categoria
            $table->string('title'); // Título do post
            $table->text('content'); // Conteúdo do post
            $table->string('image')->nullable(); // Imagem do post (opcional)
            $table->timestamps(); // Timestamps para created_at e updated_at

            // Relacionamento com a tabela users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Relacionamento com a tabela categories
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });

        // Criar a tabela post_tag (relacionamento muitos-para-muitos com tags)
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); // Relacionamento com posts
            $table->unsignedBigInteger('tag_id'); // Relacionamento com tags
            $table->timestamps(); // Timestamps para created_at e updated_at

            // Relacionamento com a tabela posts
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            // Relacionamento com a tabela tags
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            // Garantir que a combinação de post_id e tag_id seja única
            $table->unique(['post_id', 'tag_id']);
        });
    }

    public function down()
    {
        // Deletar as tabelas post_tag e posts (com cascata)
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('posts');
    }
};
