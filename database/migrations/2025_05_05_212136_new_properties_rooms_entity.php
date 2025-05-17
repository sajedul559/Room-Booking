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
        Schema::table('rooms', function (Blueprint $table) {
            $table->string('room_type');
            $table->string('bathroom_type');
            $table->string('bed_size');
            $table->string('furnishFeatures');
            $table->string('tenant_preference');
            $table->boolean('is_women_only');
            $table->string('accepting_options');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rooms', function (Blueprint $table) {
            $table->dropColumn('room_type');
            $table->dropColumn('bathroom_type');
            $table->dropColumn('bed_size');
            $table->dropColumn('furnishFeatures');
            $table->dropColumn('tenant_preference');
            $table->dropColumn('is_women_only');
            $table->dropColumn('accepting_options');
        });
    }
};
