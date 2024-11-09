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
                $table->unsignedBigInteger('category_id');
                $table->string('title');
                $table->text('description');
                $table->boolean('status')->default(true);
                $table->string('image')->nullable();
                $table->foreign('category_id')->references('id')->on('categories');
                $table->timestamps();
            });
        }
    }

    public function down()
    {
      
        Schema::dropIfExists('topics');
    }
};
