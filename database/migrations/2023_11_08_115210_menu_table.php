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
        Schema::create('menus', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('id_admin');
            $table->foreign('id_admin')->references('id')->on('admins');
            $table->string('name');
            $table->string('desc');
            $table->string('image_path');
            $table->smallInteger('number_available');
            $table->smallInteger('number_sale');
            $table->smallInteger('favorite');
            $table->enum('food_type', ['Makanan', 'Minuman','Snack']);
            $table->decimal('price_food', 8, 2);
            $table->decimal('discount', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
