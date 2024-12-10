<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->engine = 'InnoDB';  // Ensure InnoDB engine

            $table->id('customerId');
            $table->unsignedBigInteger('Admin_Id');  // Match the type with 'admins.Admin_Id'
            $table->string('CustomerFname')->nullable();
            $table->string('CustomerMname')->nullable();
            $table->string('CustomerLname')->nullable();
            $table->string('CustomerSname')->nullable();
            $table->integer('CustomerPhone')->nullable();
            $table->string('CustomerAddress')->nullable();
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('Admin_Id')
                ->references('Admin_Id')->on('admins')  // Make sure the column name matches
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
