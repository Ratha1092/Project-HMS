<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();

            $table->foreignId('hotel_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('room_number');
            $table->decimal('price', 10, 2);
            $table->unsignedInteger('capacity');

            $table->string('status')
                  ->default('available')
                  ->index();

            $table->timestamps();

            // Prevent duplicate room numbers per hotel
            $table->unique(['hotel_id', 'room_number']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
