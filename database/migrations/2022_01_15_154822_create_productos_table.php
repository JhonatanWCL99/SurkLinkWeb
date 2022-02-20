<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
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
            $table->string('nombre',70);
            $table->string('descripcion',50);
            $table->string('modelo',50);
            $table->integer('stock');
            $table->float('precio_unitario',50);
            $table->unsignedBigInteger('inventario_id');
            $table->timestamps();

            $table->foreign('inventario_id')->references('id')->on('inventarios')
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
        Schema::dropIfExists('productos');
    }
}
