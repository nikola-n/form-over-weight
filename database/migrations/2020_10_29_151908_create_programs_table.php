<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            //////////////////
            //
            //
            //
            //// $table->string('duration')->nullable();
            //
            //// MemberProgram => Pivot? Regular Eloquent Model
            //
            //$table->dateTime('start_date')->nullable();
            //$table->dateTime('end_date')->nullable();
            //$table->foreignId('member_id')->references('id')->on('members')->onDelete('cascade');
            //$table->foreignId('trainer_id')->references('id')->on('trainers')->onDelete('cascade');
            //$table->foreignId('gym_id')->references('id')->on('gyms')->onDelete('cascade');
            //// $table->foreignId('city_id')->references('id')->on('cities')->onDelete('cascade');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programs');
    }
}
