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
            $table->string('descripcion', 70);
            $table->date('fecha');
            $table->string('tipo_venta', 20);
            $table->unsignedBigInteger('promocion_id');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('promocion_id')->references('id')->on('promociones')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('usuario_id')->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');
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
