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
        Schema::create('detail_transactions', function (Blueprint $table) {
            $table->id(); // Kolom ID
            $table->unsignedBigInteger('trans_id'); // Kolom TransID
            $table->unsignedBigInteger('course_id'); // Kolom CourseID
            $table->unsignedBigInteger('instructor_id'); // Kolom InstructorID
            $table->date('startdate'); // Kolom StartDate
            $table->decimal('price', 10, 2); // Kolom Price
            $table->decimal('discount', 10, 2); // Kolom Discount

            // Menambahkan foreign key constraint
            $table->foreign('trans_id')->references('id')->on('transactions');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->foreign('instructor_id')->references('id')->on('instructors');

            $table->timestamps(); // Kolom timestamps (created_at dan updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transactions');
    }
};
