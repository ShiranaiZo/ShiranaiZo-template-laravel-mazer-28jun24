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
        Schema::create('promos', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->bigInteger('price')->nullable();
            $table->boolean('show_price')->nullable();
            $table->json('genders')->nullable();
            $table->json('age_category_ids')->nullable(); // JSON array untuk age category
            $table->foreignUlid('price_category_id')->nullable()->constrained('price_categories')->onDelete('set null');
            $table->foreignUlid('unit_category_id')->nullable()->constrained('unit_categories')->onDelete('set null');
            $table->foreignUlid('created_by_id')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignUlid('updated_by_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};