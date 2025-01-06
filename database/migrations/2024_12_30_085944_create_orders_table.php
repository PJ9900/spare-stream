<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('cart_token')->nullable(); // For guest users
            $table->decimal('total_amount', 10, 2);
            $table->text('shipping_address');
            $table->text('billing_address')->nullable();
            $table->string('payment_method');
            $table->enum('payment_status', ['pending', 'completed', 'failed'])->default('pending');
            $table->enum('order_status', ['pending', 'processing', 'shipped', 'delivered'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}