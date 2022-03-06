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
        Schema::create('pelajars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nim')->unique()->nullable();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('alamat')->nullable();
            $table->bigInteger('no_hp');
            $table->string('jeniskelamin')->nullable();
            $table->string('foto')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('pelajars');
    }
};
