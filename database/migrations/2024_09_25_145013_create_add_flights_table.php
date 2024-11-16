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
        Schema::create('add_flights', function (Blueprint $table) {
            $table->id();
            $table->string('Flight_Number');
            // $table->json('flight_classes');
            $table->boolean('is_economy_available')->default(false); // Checkbox for economy class
            $table->boolean('is_business_available')->default(false); // Checkbox for business class
            $table->string('NOS_Economy');
            $table->string('NOS_Business');
            $table->string('NOS_Total'); 
            // $table->integer('NOS_Total');
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
        Schema::dropIfExists('add_flights');
    }
};
