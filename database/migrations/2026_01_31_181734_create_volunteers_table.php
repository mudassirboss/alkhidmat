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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('country');
            $table->string('mobile_no');
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('district')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('area_of_interest')->nullable();
            $table->string('current_institute')->nullable();
            $table->string('reference_code')->nullable();
            $table->boolean('has_disability')->default(false);
            $table->boolean('alkhidmat_digital_team')->default(false);
            $table->text('why_interested')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
