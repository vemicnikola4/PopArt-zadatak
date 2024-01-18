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
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable(false);
            $table->text('description')->nullable(false);
            $table->integer('price')->nullable(false);
            $table->string('condition')->nullable(false);
            $table->foreignId('custumer_id')->references('id')->on('custumers')->onUpdate('cascade')->cascadeOnDelete();
            $table->foreignId('ad_category_id')->references('id')->on('ad_categories')->onUpdate('cascade')->restrictOnDelete();
            $table->foreignId('ad_category_2_id')->nullable(true)->references('id')->on('ad_categories_2')->onUpdate('cascade')->restrictOnDelete();
            $table->foreignId('category_3_id')->nullable(true)->references('id')->on('ad_categories_3')->onUpdate('cascade')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads');
    }
};
