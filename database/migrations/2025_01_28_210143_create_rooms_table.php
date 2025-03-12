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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->text('video_url')->nullable();
            $table->text('video_image')->nullable();
            $table->text('room_furnishings')->nullable();
            $table->boolean('internet')->default(false);
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('weekly_rent', 10, 2)->nullable();
            $table->boolean('is_bill_included_rent')->default(false);
            $table->decimal('bond', 10, 2)->nullable();
            $table->date('available_date')->nullable();
            $table->integer('min_length_of_stay')->nullable();
            $table->integer('max_length_of_stay')->nullable();
            $table->boolean('is_smoking_allowed')->default(false);
            $table->boolean('is_pet_allowed')->default(false);
            $table->boolean('on_welfare_allowed')->default(false);
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
