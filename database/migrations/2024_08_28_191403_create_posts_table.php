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
            $table->unsignedBigInteger('topic_id')->nullable(); // Relacionamento com o tópico
            $table->timestamps(); // Timestamps para created_at e updated_at
        });

        // Adicionar as foreign keys após garantir que as tabelas referenciadas existem
        Schema::table('posts', function (Blueprint $table) {
            // Relacionamento com a tabela users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            // Relacionamento com a tabela categories
            $table->foreign('category_id')->references('idCategory')->on('categories')->onDelete('cascade');

            // Relacionamento com a tabela topics (novo relacionamento)
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('set null');
        });

        // Criar a tabela post_tag (relacionamento muitos-para-muitos com tags)
        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id'); // Relacionamento com posts
            $table->unsignedBigInteger('tag_id'); // Relacionamento com tags
            $table->timestamps(); // Timestamps para created_at e updated_at
        });

        Schema::table('post_tag', function (Blueprint $table) {
            // Relacionamento com a tabela posts
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            // Relacionamento com a tabela tags
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            // Garantir que a combinação de post_id e tag_id seja única
            $table->unique(['post_id', 'tag_id']);
        });

        // Adicionar a coluna post_id à tabela comments
        Schema::table('comments', function (Blueprint $table) {
            // Adiciona a coluna post_id sem a chave estrangeira
            $table->unsignedBigInteger('post_id')->nullable(); // Permite null para dados existentes
        });

        Schema::table('comments', function (Blueprint $table) {
            // Adiciona a chave estrangeira
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    public function down()
    {
        // Deletar a chave estrangeira e a coluna post_id na tabela comments
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropColumn('post_id');
        });

        // Deletar a tabela post_tag
        Schema::table('post_tag', function (Blueprint $table) {
            $table->dropForeign(['post_id']);
            $table->dropForeign(['tag_id']);
        });

        Schema::dropIfExists('post_tag');

        // Deletar a tabela posts
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['category_id']);
            $table->dropForeign(['topic_id']); // Remover a chave estrangeira para o topic_id
        });

        Schema::dropIfExists('posts');
    }
};
