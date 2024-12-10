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
        Schema::create('sales_report', function (Blueprint $table) {
            $table->id('reportId');
            $table->unsignedBigInteger('invoiceId');
            $table->unsignedBigInteger('Admin_Id');
            $table->decimal('totalSales', 10, 2);
            $table->unsignedBigInteger('expense_id');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('netProfit', 10, 2);
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('invoiceId')->references('invoiceId')->on('invoices')->onDelete('cascade');
            $table->foreign('Admin_Id')->references('Admin_Id')->on('admins')->onDelete('cascade');
            $table->foreign('expense_id')->references('expense_id')->on('expenses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_report');
    }
};
