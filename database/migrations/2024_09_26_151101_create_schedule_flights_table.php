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
        Schema::create('schedule_flights', function (Blueprint $table) {
            $table->id();
            $table->string('flight_number')->unique();
            $table->string('class');
            $table->string('nos_economy')->nullable();
            $table->string('nos_business')->nullable();
            $table->string('select_source')->nullable()->default(0);
            $table->string('select_destination')->nullable()->default(0);
            $table->datetime('depart_date_time');
            $table->datetime('arriv_date_time');
            $table->string('class_cost')->nullable();
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
        Schema::dropIfExists('schedule_flights');
    }
};
