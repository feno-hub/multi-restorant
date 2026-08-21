<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            $table->foreignId('resto_id')
                ->constrained('restos')
                ->cascadeOnDelete();

            $table->string('order_number')
                ->unique();

            $table->decimal('subtotal', 10, 2);

            $table->decimal('delivery_fee', 10, 2)
                ->default(0);

            $table->decimal('total', 10, 2);

            $table->enum('status', [
                'pending',
                'confirmed',
                'preparing',
                'ready',
                'delivered',
                'cancelled'
            ])->default('pending');

            $table->text('note')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};