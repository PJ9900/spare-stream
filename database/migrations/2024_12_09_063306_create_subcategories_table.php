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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Subcategory name
            $table->string('slug')->unique(); // Slug for SEO-friendly URLs
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to categories table
            $table->string('meta_keywords')->nullable(); // SEO meta keywords (nullable)
            $table->string('meta_description')->nullable(); // SEO meta description (nullable)
            $table->tinyInteger('status')->default(1); // Status: 1 = active, 0 = inactive (default 1)
            $table->integer('serial')->default(0)->nullable(); // Serial or order number for sorting subcategories
            $table->tinyInteger('show_menu')->default(1); // Whether the subcategory should appear in the menu (default true)

            $table->integer('menu_priority')->default(0); // Priority for menu ordering
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
