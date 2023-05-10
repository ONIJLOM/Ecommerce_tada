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
        Schema::create('shopping_cart_details', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProd')->nullable();
            $table->integer('cantidad')->nullable();
            $table->float('precioU')->nullable();
            $table->float('total')->nullable();
            $table->unsignedBigInteger('cart_id')->nullable();
            $table->unsignedBigInteger('prod_id')->nullable();
            $table->foreign('cart_id')->references('id')->on('shopping_carts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('prod_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_cart_details');
    }
};
