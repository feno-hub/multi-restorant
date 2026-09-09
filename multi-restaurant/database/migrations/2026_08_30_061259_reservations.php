<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('resto_id')
                ->constrained('restos')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('guests');
            $table->text('message')->nullable();
            $table->date('date');
            $table->time('time');
            $table->decimal('total', 10, 2);

            $table->enum('status', [
                'pending',
                'accepted',
                'refused'
            ])->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};