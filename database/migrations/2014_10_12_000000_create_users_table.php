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
        Schema::create('users', function (Blueprint $table) {
            // User's basic info
            $table->id(); // auto-incrementing ID
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('photo')->nullable(); // URL or path to photo
            $table->string('email_token')->nullable(); // Token for email verification
            $table->string('password'); // Encrypted password

            // Shipping Address
            $table->string('ship_address1');
            $table->string('ship_address2')->nullable();
            $table->string('ship_zip');
            $table->string('ship_city');
            $table->string('ship_country');
            $table->string('ship_company')->nullable();

            // Billing Address
            $table->string('bill_address1');
            $table->string('bill_address2')->nullable();
            $table->string('bill_zip');
            $table->string('bill_city');
            $table->string('bill_country');
            $table->string('bill_company')->nullable();

            // Additional Info
            $table->enum('role_as', ['user', 'admin'])->default('user');
            $table->string('paytm_number')->nullable();

            // OTP and Device Info
            $table->boolean('otp_verify')->default(false);
            $table->string('otp')->nullable();
            $table->timestamp('verify_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
