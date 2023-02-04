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
        Schema::create('users', function (Blueprint $table) {
            $table->id('userID');
            $table->string('displayPhoto')->nullable();
            $table->string('studentID');
            $table->string('password');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('program');
            $table->string('yearLevel');
            $table->string('section');
            $table->date('birthDate');
            $table->string('email')->nullable();
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
        Schema::dropIfExists('users');
    }
};
