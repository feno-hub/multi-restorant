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
        Schema::create('reservation_infos', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('resto_id')
                ->constrained('restos')
                ->cascadeOnDelete();

            $table->decimal('price', 10, 2);
            $table->string('table');
            $table->string('place');
            $table->enum('delay', ['1', '0'])->default('1');
            $table->enum('is_active', ['1', '0'])->default('1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_infos');
    }
};
