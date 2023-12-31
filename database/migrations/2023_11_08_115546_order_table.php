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
        Schema::create('orders', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedSmallInteger('id_customer');
            $table->foreign('id_customer')->references('id')->on('customers');
            $table->date('date');
            $table->string('order_status');
            $table->decimal('total_price', 8, 2);
            $table->string('payment_status');
            $table->tinyInteger('table_number');
            $table->string('snap_token', 36)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
