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
        Schema::create('invoices', function (Blueprint $table) {
              $table->engine = 'InnoDB'; 
            $table->id('invoiceId');
            $table->unsignedBigInteger('orderId');
            $table->decimal('totalAmount', 10, 2);
              $table->enum('paymentType', ['Cash', 'GCash'])->default('Cash');
              $table->string('Gcash_receipt')->nullable();
            $table->decimal('amountPaid', 10, 2);
            $table->decimal('changeGiven', 10, 2);
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('orderId')->references('orderId')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
