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
        Schema::table('rent_payment_histories', function (Blueprint $table) {
            $table->dropColumn('remaining_payment_amount');
            $table->dropColumn('rent_due_amount');
            $table->dropColumn('remaining_amount_after_paid');
            $table->dropColumn('rent_due_amount_after_paid');
            
            $table->string('payment_method');
            $table->string(column: 'payment_status');
            $table->string('note')->nullable();
            $table->string('receipt_number')->nullable();
            $table->string('currency')->nullable();
            $table->boolean('is_partial');
            $table->date('due_date');
            $table->string('property_address')->nullable();
            $table->string('room_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rent_payment_histories', function (Blueprint $table) {
            $table->decimal('remaining_payment_amount', 10, 2);
            $table->decimal('rent_due_amount', 10, 2);
            $table->decimal('remaining_amount_after_paid', 10, 2);
            $table->decimal('rent_due_amount_after_paid', 10, 2);

            $table->dropColumn('payment_method');
            $table->dropColumn('payment_status');
            $table->dropColumn('note');
            $table->dropColumn('receipt_number');
            $table->dropColumn('currency');
            $table->dropColumn('is_partial');
            $table->dropColumn('due_date');
            $table->dropColumn('property_address');
            $table->dropColumn('room_name');
        });
    }
};
