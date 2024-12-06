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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_description');
            $table->longText('description');
            $table->enum('status', ['Active', 'Private', 'Upcoming', 'Pending', 'Draft', 'Inactive']);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key to categories table
            $table->enum('level', ['Beginner', 'Intermediate', 'Advanced']);
            $table->enum('pricing_type', ['Paid', 'Free']);
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('discounted_price', 8, 2)->nullable();
            $table->string('thumbnail_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
