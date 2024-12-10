<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id'); // Relacionamento
            $table->string('title');
            $table->text('description');
            $table->boolean('status')->default(true);
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Adicionar a constraint após garantir que 'categories' foi criada
        Schema::table('topics', function (Blueprint $table) {
            $table->foreign('category_id')
                ->references('idCategory')
                ->on('categories')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('topics', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });

        Schema::dropIfExists('topics');
    }
};
