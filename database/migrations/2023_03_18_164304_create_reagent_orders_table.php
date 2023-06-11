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
        Schema::create('reagent_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id', 'order_id_fk_8181509')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('reagent_id');
            $table->foreign('reagent_id', 'reagent_id_fk_8181509')->references('id')->on('reagents')->onDelete('cascade');
            $table->string('quantity');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reagent_orders');
    }
};
