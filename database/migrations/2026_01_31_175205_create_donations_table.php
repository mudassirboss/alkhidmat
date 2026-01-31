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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 10, 2);
            $table->string('currency')->default('PKR');
            $table->string('donation_type')->default('one-time'); // one-time, monthly
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('purpose')->nullable(); // zakat, sadqah, etc.
            $table->string('payment_method'); // jazzcash, easypaisa, bank, card
            $table->string('transaction_id')->nullable();
            $table->string('status')->default('pending'); // pending, completed, failed
            $table->text('admin_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
