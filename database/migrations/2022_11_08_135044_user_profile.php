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
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim')->unique();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->enum('gender', ['pria, wanita']);
            $table->text('alamat');
            $table->date('ttl');
            $table->string('password');
            $table->foreignId('id_user')->nullable()->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
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
