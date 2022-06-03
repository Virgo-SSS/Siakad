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
        Schema::create('biodata', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->bigInteger('nik');
            $table->string('email');
            $table->string('citizenship');
            $table->enum('gender',['L','P']); // L = LAKI-LAKI (MALE) && P = PEREMPUAN (FEMALE)
            $table->bigInteger('phone');
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('religion');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('biodata');
    }
};
