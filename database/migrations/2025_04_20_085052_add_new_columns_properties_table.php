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
        Schema::table('properties', function (Blueprint $table) {
            $table->integer('total_bedroom');
            $table->integer('total_bathroom');
            $table->integer('total_people_live');
            $table->string('parking');
            $table->string('internet');
            $table->string('accessibility');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('total_bedroom');
            $table->dropColumn('total_bathroom');
            $table->dropColumn('total_people_live');
            $table->dropColumn('parking');
            $table->dropColumn('internet');
            $table->dropColumn('accessibility');
        });
    }
};
