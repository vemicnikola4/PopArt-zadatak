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
        Schema::create('custumers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name')->nullable(false);
            $table->string('last_name')->nullable(false);
            $table->string('location')->nullable(false);
            $table->string('phone_number')->nullable(false);
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custumers');
    }
};
