<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('ClaveTransaccion', 255);
            $table->string('PaypalData', 255);
            $table->timestamps();
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->integer('telefono');
            $table->string('email', 255);
            $table->string('direccion', 255);
            $table->string('region', 255);
            $table->string('localidad', 255);
            $table->integer('cp');
            $table->string('envio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
