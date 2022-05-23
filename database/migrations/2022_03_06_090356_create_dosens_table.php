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
        Schema::create('dosens', function (Blueprint $table) {
            $table->string('nidn')->unique()->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('jeniskelamin')->nullable();
            $table->string('alamat')->nullable();
            $table->string('no_hp');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('dosens');
    }
};
