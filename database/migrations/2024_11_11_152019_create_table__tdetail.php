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
        Schema::create('table__tdetail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('traveller_details_id')->nullable()->constrained('traveller_details')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('dob');
            $table->string('fname');
            $table->string('lname');
            $table->string('contact');
            $table->string('email');
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
        Schema::dropIfExists('table__tdetail');
    }
};
