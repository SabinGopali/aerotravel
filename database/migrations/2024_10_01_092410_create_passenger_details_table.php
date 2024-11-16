<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passenger_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('schedule_flights_id')->constrained('schedule_flights')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('fname');
            $table->string('lname');
            $table->string('contact');
            $table->string('dob');
            $table->string('npassengers');
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
        Schema::dropIfExists('passenger_details');
    }
};
