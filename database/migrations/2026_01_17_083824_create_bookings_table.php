<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->foreignId('room_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->date('check_in')->index();
            $table->date('check_out')->index();

            $table->string('status')
                  ->default('pending')
                  ->index();

            $table->timestamps();

            // Booking conflict optimization
            $table->index(['room_id', 'check_in', 'check_out']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
