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
        Schema::connection('mysql2')->create('students', function (Blueprint $table) {
            $table->string("studentID")->primary();
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('program');
            $table->string('yearLevel');
            $table->string('section');
            $table->date('birthDate');
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
        Schema::connection('mysql2')->dropIfExists('students');
    }
};
