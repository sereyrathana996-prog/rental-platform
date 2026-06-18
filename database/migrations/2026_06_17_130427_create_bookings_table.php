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
        Schema::create('bookings', function ($table){

        $table->id();

        $table->foreignId('user_id')
        ->constrained();

        $table->foreignId('asset_id')
        ->constrained();

        $table->date('start_date');

        $table->date('end_date');

        $table->decimal('total_amount',10,2);

        $table->string('status')
        ->default('pending');

        $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
