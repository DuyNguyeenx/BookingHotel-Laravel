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
			$table->string('name');
            $table->string('image')->nullable();
            $table->string('capacity')->nullable();
            $table->string('services')->nullable();
            $table->string('description')->nullable();
			$table->decimal('price', 10, 0);
			$table->unsignedBigInteger('type_id');
			$table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
			$table->unsignedBigInteger('discount_id')->nullable();
			$table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
			$table->timestamps();
            $table->softDeletes();
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
