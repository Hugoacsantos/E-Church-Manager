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
        Schema::create('participation_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('event_id')->references('id')->on('events')->cascadeOnDelete();
            $table->timestamp('participation_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participation_histories');
    }
};
