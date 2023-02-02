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
        Schema::create('voteinfoarchives', function (Blueprint $table) {
            $table->foreignId('votearchive_id')->constrained()->onDelete('cascade');
            $table->foreignId('electionarchive_id')->constrained()->onDelete('cascade');
            $table->foreignId('positionarchive_id')->constrained()->onDelete('cascade');
            $table->string('studentID');
            $table->string('candidateID');
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
        Schema::dropIfExists('voteinfoarchives');
    }
};
