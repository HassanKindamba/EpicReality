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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 10, 2); // Add price field
            $table->string('icon')->nullable(); // icon field
            $table->string('link')->nullable();  // link field
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('services', function (Blueprint $table) {
    $table->id();
    $table->string('title');          // Kichwa cha huduma
    $table->text('description');      // Maelezo ya huduma
    $table->decimal('price', 10, 2);  // Bei ya huduma (10 digits total, 2 decimal places)
    $table->timestamps();
});

    }
};
