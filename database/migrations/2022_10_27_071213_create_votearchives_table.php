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
        Schema::create('votearchives', function (Blueprint $table) {
            $table->id();
            $table->foreignId('electionarchive_id')->constrained()->onDelete('cascade');
            $table->string('studentID');
            $table->string('yearLevel');
            $table->string('program');
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
        Schema::dropIfExists('votearchives');
    }
};
