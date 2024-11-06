<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('topic_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');
            $table->unsignedBigInteger('topic_id');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->foreign('topic_id')->references('id')->on('topics');
        });
    }

    public function down()
    {
        Schema::dropIfExists('topic_tags');
    }
};