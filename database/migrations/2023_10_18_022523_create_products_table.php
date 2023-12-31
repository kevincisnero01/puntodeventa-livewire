<?php

use App\Enums\ProductStatusEnum;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('code')->unique()->nullable();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->integer('stock')->default(0);
            $table->string('image')->nullable();
            $table->decimal('sell_price',8,2)->nullable();
            $table->mediumText('short_description')->nullable();
            $table->longText('long_description')->nullable();
            $table->enum('status', ProductStatusEnum::values())->default('Borrador'); 
            $table->foreignId('category_id')->constrained();
            $table->foreignId('provider_id')->constrained();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
