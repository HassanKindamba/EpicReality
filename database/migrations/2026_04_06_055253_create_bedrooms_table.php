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
        Schema::create('bedrooms', function (Blueprint $table) {
    $table->id();
    $table->foreignId('property_id')->constrained()->onDelete('cascade');
    $table->string('name');
    $table->integer('size')->nullable();          
    $table->integer('no_of_doors')->nullable();
    $table->integer('no_of_windows')->nullable();
    $table->decimal('area', 10, 2)->nullable();
    $table->decimal('price', 15, 2)->nullable();
    $table->string('image')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bedrooms');
    }
};