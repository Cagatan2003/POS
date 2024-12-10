<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashiersTable extends Migration
{
   public function up()
{
    Schema::create('cashiers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
        $table->id('cashier_id');
         $table->unsignedBigInteger('Admin_Id')->nullable(); 
        $table->string('CashierUsername')->unique();
        $table->string('CashierEmail')->unique();
        $table->string('CashierFname');
        $table->string('CashierMname')->nullable();
        $table->string('CashierLname');
        $table->date('CashierBdate');
        $table->integer('CashierPhone');
        $table->string('CashierAddress')->nullable();
        $table->string('CashierGender')->nullable();
        $table->string('CashierProfile')->nullable();
        $table->string('CashierPass'); // Use 'password' for hashing
        $table->enum('CashierStatus', ['active', 'inactive'])->default('inactive');
        $table->timestamp('email_verified_at')->nullable();
        $table->rememberToken();
        $table->timestamps();

         $table->foreign('Admin_Id')
                  ->references('Admin_Id')
                  ->on('admins')
                  ->onDelete('set null');
    });
}


    public function down()
    {
        Schema::dropIfExists('cashiers');
    }
}
