<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->engine = 'InnoDB';  // Set engine to InnoDB
            $table->id();
            $table->string('categoryName');
            $table->timestamps();
        });

        // Insert default categories into the categories table
        \DB::table('categories')->insert([
            ['categoryName' => 'Pater'],
            ['categoryName' => 'Sidedishes'],
            ['categoryName' => 'Sweet Treats'],
            ['categoryName' => 'Dessert'],
            ['categoryName' => 'Beverages'],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
