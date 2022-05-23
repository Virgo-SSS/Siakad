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
        Schema::create('ayahs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('nik');
            $table->date('tgllahir');
            $table->bigInteger('no_hp');
            $table->string('pendidikan_terakhir');
            $table->string('penghasilan');
            $table->integer('id_pelajar');
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
        Schema::dropIfExists('ayahs');
    }
};
