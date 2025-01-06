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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Category name
            $table->string('slug')->unique(); // Slug for SEO-friendly URLs
            $table->string('photo')->nullable(); // Path to category photo (nullable)
            $table->string('meta_keywords')->nullable(); // SEO meta keywords (nullable)
            $table->string('meta_description')->nullable(); // SEO meta description (nullable)
            $table->tinyInteger('status')->default(1); // Status: 1 = active, 0 = inactive (default 1)
            $table->boolean('is_feature')->default(false); // Whether the category is featured (default false)
            $table->integer('serial')->default(0); // Serial or order number for sorting categories
            $table->boolean('show_menu')->default(true); // Whether the category should appear in the menu (default true)

            $table->integer('menu_priority')->default(0); // Priority for menu ordering

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
