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
        Schema::create('ad_categories_3', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title')->nullable(false);;
            $table->foreignId('ad_category_2_id')->references('id')->on('ad_categories_2')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_category_3s');
    }
};
