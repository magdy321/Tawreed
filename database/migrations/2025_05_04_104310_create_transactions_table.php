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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->enum('transaction_type', ['in', 'out']);
            $table->decimal('total_price', 10, 2); // إجمالي الفاتورة
            $table->decimal('paid', 10, 2)->default(0); // المبلغ المدفوع
            $table->decimal('remaining', 10, 2); // المتبقي
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
