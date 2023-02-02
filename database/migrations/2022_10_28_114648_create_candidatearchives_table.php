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
        Schema::create('candidatearchives', function (Blueprint $table) {
            $table->id();
            $table->foreignID('positionarchive_id')->constrained()->onDelete('cascade');
            $table->string('studentID');
            $table->string('firstName');
            $table->string('middleName');
            $table->string('lastName');
            $table->string('program');
            $table->string('yearLevel');
            $table->string('section');
            $table->string('party');
            $table->integer('votes');
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
        Schema::dropIfExists('candidatearchives');
    }
};
