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
        Schema::create('soal', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->foreignId('id_user')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('jenis_pertanyaan', ['ganda, essay']);
            $table->enum('a', ['true, false']);
            $table->enum('b', ['true, false']);
            $table->enum('c', ['true, false']);
            $table->enum('d', ['true, false']);
            $table->text('jawaban');
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
        //
    }
};
