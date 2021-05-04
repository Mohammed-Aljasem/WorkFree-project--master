<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('skill_id')->nullable()->constrained('skills')->onDelete('set null');
            $table->foreignId('post_id')->nullable()->constrained('posts')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_technologies');
    }
}
