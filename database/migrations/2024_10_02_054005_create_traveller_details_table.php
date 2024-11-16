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
        Schema::create('traveller_details', function (Blueprint $table) {
                $table->id();
                $table->string('tripname');
                $table->string('packagecost');
                $table->text('description');
                $table->string('destinationimage');
                $table->string('hotelname');
                $table->unsignedTinyInteger('rating');
                $table->string('hotelimage');
                $table->string('hotellocation');
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
        Schema::dropIfExists('traveller_details');
    }
};
