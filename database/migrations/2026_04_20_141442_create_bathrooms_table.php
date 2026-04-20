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
    Schema::create('bathrooms', function (Blueprint $table) {
        $table->id();

        $table->foreignId('property_id')->constrained()->onDelete('cascade');
        $table->foreignId('bedroom_id')->nullable()->constrained()->onDelete('cascade');

        $table->integer('number')->default(1);
        $table->string('type')->nullable(); // e.g ensuite, shared
        $table->string('shower')->nullable(); // yes/no or type
        $table->string('doors')->nullable(); // NEW
        $table->string('image')->nullable(); // NEW (image path)
        $table->string('bathroom')->nullable(); // NEW (name/title if needed)
        $table->string('area')->nullable(); // NEW (e.g 12sqm)
        $table->text('description')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bathrooms');
    }
};
