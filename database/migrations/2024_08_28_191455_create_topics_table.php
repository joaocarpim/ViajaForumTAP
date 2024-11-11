<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('topics')) {
            Schema::create('topics', function (Blueprint $table) {
                $table->id();
                // Removido a criação manual da coluna 'category_id'
                $table->foreignId('category_id')->constrained('categories', 'idCategory'); // Criação da chave estrangeira
                $table->string('title');
                $table->text('description');
                $table->boolean('status')->default(true);
                $table->string('image')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down()
    {
        Schema::dropIfExists('topics');
    }
};
