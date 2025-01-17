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
    public function up()
    {
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->integer('size');
            $table->enum('color', ['red', 'green', 'blue'])->default('green');
            $table->float('price', 5, 2)->nullable();
            // $table->bigInteger('product_id', false, true);
            $table->timestamps();

            $table->foreignId("product_id")->references("id")->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_details');
    }
};
