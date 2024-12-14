<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';  // Ensure InnoDB is used
            $table->id('productId'); // Primary Key
            $table->unsignedBigInteger('categoryId'); // Foreign key to categories table
            $table->string('productName');
            $table->string('productDescription')->nullable();
            $table->decimal('productPrice', 8, 2);
            $table->integer('productStock')->nullable(); // Stock can be nullable if needed
            $table->integer('productSold')->default(0); // Default 0 for sold products
            $table->integer('productRemaining')->default(0); // Default 0 for remaining stock
            
            $table->enum('productAvailability', ['Available', 'Not Available'])->default('Available');  // Enum for availability
           $table->string('ProductImage')->default('products/X4ulmi83JccQtLd8550EciEj4cEUjQNUNqHiVzAo.jpg');
            
 
            
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('categoryId')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
