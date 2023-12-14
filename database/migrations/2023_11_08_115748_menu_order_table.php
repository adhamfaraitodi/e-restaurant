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
        Schema::create('menu_order', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('id_menu');
            $table->foreign('id_menu')->references('id')->on('menus');
            $table->unsignedSmallInteger('id_order');
            $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');
            $table->smallInteger('quantity');
            $table->decimal('price_food', 8, 2);
            $table->decimal('discount', 8, 2);
            $table->decimal('subtotal', 8, 2);
            $table->string('menu_note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_order');
    }
};
