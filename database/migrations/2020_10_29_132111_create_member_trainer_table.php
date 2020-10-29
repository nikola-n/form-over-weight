<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberTrainerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_trainer', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreignId('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
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
        Schema::dropIfExists('member_trainer');
    }
}
