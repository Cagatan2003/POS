    <?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateTransactionsTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('transactions', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->string('order_type'); // Dine-in or Take-out
                $table->string('payment_method'); // Cash or GCash
                $table->decimal('total_amount', 10, 2); // Total order amount
                $table->decimal('amount_paid', 10, 2); // Paid amount
                $table->string('gcash_receipt_no')->nullable(); // GCash receipt number (nullable)
                $table->timestamps(); // Created at and updated at timestamps
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('transactions');
        }
    }
