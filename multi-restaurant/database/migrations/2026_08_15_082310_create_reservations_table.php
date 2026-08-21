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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('resto_id')
                ->constrained('restos')
                ->cascadeOnDelete();

            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('message');
            $table->string('date');
            $table->string('time');
            $table->string('guests');
            $table->enum('status', ['ACCEPTER', 'REFUSER', 'EN_ATTENT'])->default('EN_ATTENT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
