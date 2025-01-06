<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');  // Make user_id nullable
            $table->foreignId('prod_id')->constrained('products');
            $table->integer('prod_qty');
            $table->decimal('price', 10, 2);
            $table->decimal('total_price', 10, 2);
            $table->timestamps();
            $table->string('cart_token')->nullable();  // For guest users
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}