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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('ci',10)->unique(); //incluye la posibilidad de V-12345678 
            $table->string('rif',13)->unique(); //incluye la posibilidad de J-123456789-A
            $table->text('address')->nullable();
            $table->string('phone', 20); //incluye la posibilidad de +58 0412-1234567
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
