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
        Schema::create('rent_payment_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vendor_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('rent_id');
            $table->unsignedBigInteger('payment_id');
            $table->decimal('total_payment_amount', 10, 2);
            $table->decimal('remaining_payment_amount', 10, 2);
            $table->decimal('rent_due_amount', 10, 2);
            $table->decimal('total_rent_paid', 10, 2);
            $table->decimal('remaining_amount_after_paid', 10, 2);
            $table->decimal('rent_due_amount_after_paid', 10, 2);
            $table->date('payment_date');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('last_updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_payment_histories');
    }
};
