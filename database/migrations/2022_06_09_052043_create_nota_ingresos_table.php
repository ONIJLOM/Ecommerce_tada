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
        Schema::create('nota_ingresos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nro');
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->smallInteger('cantidad');
            $table->float('costoProd');
            $table->float('total');
	        $table->unsignedBigInteger('id_Emp');
            $table->unsignedBigInteger('id_Prod');
	        $table->foreign('id_Emp')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_Prod')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('nota_ingresos');
    }
};
