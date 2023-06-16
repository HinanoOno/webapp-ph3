<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('record_languages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('study_hours_id');
            $table->unsignedBigInteger('language_id');
            $table->float('hours');
            $table->foreign('study_hours_id')->references('id')->on('study_hours');
            $table->foreign('language_id')->references('id')->on('languages');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {   
        Schema::dropIfExists('record_languages');
       
    }
};
