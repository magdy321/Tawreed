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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('slug')->nullable()->unique();
            $table->text('description')->nullable();
            $table->decimal('price_regular', 10, 2); // سعر العميل
            $table->decimal('price_trader', 10, 2);  // سعر التاجر
            $table->enum('unit', ['ton', 'm3']);
            $table->decimal('quantity', 10, 2);      // الكمية المتاحة
            $table->enum('status', ['active', 'inactive'])->default('active');
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
