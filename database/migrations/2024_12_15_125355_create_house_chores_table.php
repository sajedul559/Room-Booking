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
        Schema::create('house_chores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('property_id');
            $table->date('date');
            $table->date('expected_date_to_complete')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('task_type')->nullable(); // Enum can be decided later
            $table->text('comments')->nullable();
            $table->string('cleaner_booked')->nullable();
            $table->string('status');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('house_chores');
    }
};
