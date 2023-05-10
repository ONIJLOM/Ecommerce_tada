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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id();
            $table->string('nombreProd')->nullable();
            $table->integer('cantidad')->nullable();
            $table->float('precio')->nullable();
            $table->float('montoTotal')->nullable();
            $table->unsignedBigInteger('id_prod')->nullable();
            $table->unsignedBigInteger('id_notaV')->nullable();
            $table->foreign('id_prod')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_notaV')->references('id')->on('nota_ventas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_ventas');
    }
};
