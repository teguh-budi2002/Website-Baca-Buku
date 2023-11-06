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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->references('id')->on('categories')->constrained()->cascadeOnDelete();
            $table->string('image_book');
            $table->string('title');
            $table->string('slug');
            $table->enum('for_age', ['6 Tahun','12 Tahun', '18 Tahun']);
            $table->integer('visited_count')->nullable();
            $table->integer('downloaded_count')->nullable();
            $table->boolean('is_published')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
