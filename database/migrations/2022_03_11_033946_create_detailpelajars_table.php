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
        Schema::create('detailpelajars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nim')->unique()->nullable();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('prodi');
            $table->bigInteger('no_hp')->unique();
            $table->string('jeniskelamin');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('agama');
            $table->string('waktukuliah');
            $table->string('foto');
            $table->string('regis_id');
            $table->string('status');
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
        Schema::dropIfExists('detailpelajars');
    }
};
