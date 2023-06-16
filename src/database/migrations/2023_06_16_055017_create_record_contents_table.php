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
        Schema::create('record_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('study_hours_id');
            $table->unsignedBigInteger('content_id');
            $table->float('hours');
            $table->foreign('study_hours_id')->references('id')->on('study_hours');
            $table->foreign('content_id')->references('id')->on('contents');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('record_contents');
    }
};
