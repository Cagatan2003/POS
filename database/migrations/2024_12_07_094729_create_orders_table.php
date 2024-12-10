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
        Schema::create('orders', function (Blueprint $table) {
              $table->engine = 'InnoDB'; 
            $table->id('orderId');
            $table->unsignedBigInteger('cashier_id');
               $table->enum('orderType', ['Dine-in', 'Take-out'])->default('Dine-in');
            $table->unsignedBigInteger('customerId');
            $table->decimal('totalAmount', 10, 2);
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('cashier_id')->references('cashier_id')->on('cashiers')->onDelete('cascade');
            $table->foreign('customerId')->references('customerId')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
