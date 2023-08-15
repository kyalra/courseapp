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
            $table->id(); // Kolom ID
            $table->string('trans_code')->unique(); // Kolom TransCode
            $table->date('trans_date'); // Kolom TransDate
            $table->string('cust_name'); // Kolom CustName
            $table->string('member'); // Kolom Member
            $table->decimal('subtotal', 10, 2); // Kolom Subtotal
            $table->decimal('discount', 10, 2); // Kolom Discount
            $table->decimal('total', 10, 2); // Kolom Total
            $table->timestamps(); // Kolom timestamps (created_at dan updated_at)
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
