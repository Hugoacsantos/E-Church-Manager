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
        Schema::create('ministry_user', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_usuario');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('ministerios_id')->references('id')->on('ministries');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ministry_user');
    }
};
