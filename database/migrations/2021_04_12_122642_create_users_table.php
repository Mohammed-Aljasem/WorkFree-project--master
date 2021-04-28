<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->bigInteger('mobile')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('image')->nullable();
            $table->string('card_image')->nullable();
            $table->string('description', 500)->nullable();
            $table->foreignId('role_id')->nullable()->constrained('roles');
            $table->foreignId('country_id')->nullable()->constrained('countries');
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->bigInteger('card_id')->unique()->nullable();
            $table->smallInteger('blocked')->nullable();
            $table->smallInteger('confirm_account')->nullable();
            $table->smallInteger('is_active')->nullable();
            $table->smallInteger('deleted_account')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
