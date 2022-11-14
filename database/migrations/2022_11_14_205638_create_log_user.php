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
        Schema::create('log_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_soal')->nullable()->constrained('soal')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('id_token')->nullable()->constrained('token')->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime('tgl_akses');
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
        Schema::dropIfExists('log_user');
    }
};
