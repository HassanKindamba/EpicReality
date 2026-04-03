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
    Schema::table('homes', function (Blueprint $table) {
        $table->string('eneo')->after('address');
        $table->string('jengo')->after('eneo');
    });
}

public function down(): void
{
    Schema::table('homes', function (Blueprint $table) {
        $table->dropColumn(['eneo', 'jengo']);
    });
}

};
