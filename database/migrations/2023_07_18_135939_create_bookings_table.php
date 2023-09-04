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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->integer('phone');
            $table->string('gender');
            $table->string('nation');
            $table->string('request_add');
			$table->unsignedBigInteger('room_id');
            $table->integer('card_number');
            $table->string('card_name');
            $table->date('card_date');
            $table->integer('card_code');
			$table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
			$table->date('start_date')->nullable();
			$table->date('end_date')->nullable();
            $table->decimal('total_price', 10, 0);
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
