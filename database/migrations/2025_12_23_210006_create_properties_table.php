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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('link');
            $table->text('description')->nullable();
            $table->enum('availability_status', ['Available', 'Occupied', 'Not In Use'])->default('Available');
            $table->enum('property_type', ['Apartment', 'House', 'Commercial'])->default('Apartment');
            $table->enum('visibility_status', ['Visible', 'Hidden'])->default('Hidden');
            $table->decimal('price', 19, 2);
            $table->string('image')->nullable();
            // Add user_id column, nullable initially to avoid foreign key errors
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            
            // Add foreign key constraint
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
