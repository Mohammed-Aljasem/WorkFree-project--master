<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->string('project_title');
            $table->string('description');
            $table->foreignId('client_id')->constrained('users');
            $table->foreignId('freelance_id')->constrained('users');
            $table->date('date_start');
            $table->date('date_end');
            $table->smallInteger('budget');
            $table->smallInteger('freelance_accept')->nullable();
            $table->string('project_status')->default(0)->nullable();
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
        Schema::dropIfExists('agreements');
    }
}
