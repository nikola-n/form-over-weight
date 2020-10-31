<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program_members', function (Blueprint $table) {
            $table->id();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->foreignId('program_id')->nullable()->constrained('programs');
            $table->foreignId('member_id')->nullable()->references('id')->on('members')->onDelete('cascade');
            $table->foreignId('trainer_id')->nullable()->references('id')->on('trainers')->onDelete('cascade');
            $table->foreignId('gym_id')->nullable()->references('id')->on('gyms')->onDelete('cascade');
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
        Schema::dropIfExists('program_members');
    }
}
