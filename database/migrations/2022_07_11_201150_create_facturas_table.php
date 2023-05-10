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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();
            $table->integer('nit_empresa')->default('123456789');
            $table->integer('nit_cliente')->nullable();
            $table->string('nombre')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->float('montoTotal')->nullable();
            $table->float('pago')->nullable();
            $table->float('cambio')->nullable();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->foreign('id_cliente')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('facturas');
    }
};
