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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('studentID'); 
            $table->foreignId('election_id')->constrained()->onDelete('cascade');; 
            $table->string('firstName'); 
            $table->string('middleName'); 
            $table->string('lastName'); 
            $table->string('schoolYear'); 
            $table->string('url')->nullable(); 
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
        Schema::dropIfExists('certificates');
    }
};
