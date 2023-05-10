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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
	        $table->string('descripcion');
	        $table->float('precioU');
            $table->string('image')->nullable();
	        $table->integer('stock');
	        $table->integer('cantMin');
	        $table->string('estado');
	        $table->unsignedBigInteger('id_Peso');
	        $table->unsignedBigInteger('id_Tipo');
            $table->unsignedBigInteger('id_Cat')->nullable();
	        $table->foreign('id_Peso')->references('id')->on('pesos')->onDelete('cascade')->onUpdate('cascade');
	        $table->foreign('id_Tipo')->references('id')->on('tipos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_Cat')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('productos');
    }
};
