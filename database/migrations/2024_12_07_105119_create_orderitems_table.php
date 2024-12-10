<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('orderitems', function (Blueprint $table) {
            $table->engine = 'InnoDB'; 
            $table->id('order_itemId');
            $table->unsignedBigInteger('orderId');
            $table->unsignedBigInteger('productId');
          
            $table->decimal('quantity', 10, 2);
            $table->decimal('price', 10, 2);
            $table->decimal('subtotal', 10, 2);
            $table->timestamps();

            // Adding foreign key constraints
            $table->foreign('orderId')->references('orderId')->on('orders')->onDelete('cascade');
            $table->foreign('productId')->references('productId')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('orderitems');
    }
};
