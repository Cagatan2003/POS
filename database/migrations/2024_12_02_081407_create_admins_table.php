<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
             $table->engine = 'InnoDB';
             $table->id('Admin_Id');
            $table->string('AdminUsername');
            $table->string('AdminFname');
            $table->string('AdminMname')->nullable();
            $table->string('AdminLname');
            $table->string('AdminGender');
            $table->date('AdminBdate');
            $table->integer('AdminPhone')->nullable();
            $table->string('AdminAddress')->nullable();
            $table->string('AdminEmail')->unique();
            $table->string('AdminPassword');
            $table->string('AdminProfile')->nullable();
            $table->timestamp('email_verified_at')->nullable();
      
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
