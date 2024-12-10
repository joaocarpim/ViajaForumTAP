<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Campo ID configurado como auto-increment
            $table->text('content'); // Campo para o conteúdo do comentário
            $table->foreignId('topic_id')->constrained('topics')->onDelete('cascade'); // Chave estrangeira para tópicos
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para usuários
            $table->timestamps(); // Campos de controle de tempo
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments'); // Remove a tabela ao reverter a migração
    }
};
