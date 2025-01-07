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
        Schema::create('rent_management', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('room_id');
            $table->decimal('amount', 10, 2);
            $table->date('date');
            $table->unsignedBigInteger('user_id');
            $table->enum('payment_type', ['Cash', 'Card']);
            $table->enum('payment_collection_type', ['Online', 'Offline']);
            $table->unsignedBigInteger('payment_collect_by');
            $table->text('notes')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_management');
    }
};
