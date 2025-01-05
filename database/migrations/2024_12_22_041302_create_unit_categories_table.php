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
        Schema::create('unit_categories', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->boolean('is_active')->default(true);
            // $table->ulid('created_by_id');
            // $table->ulid('updated_by_id')->nullable();
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
        Schema::dropIfExists('unit_categories');
    }
};
