<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->nullable()->constrained('posts')->onDelete('set null');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->smallInteger('accepted');
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
        Schema::dropIfExists('post_requests');
    }
}
