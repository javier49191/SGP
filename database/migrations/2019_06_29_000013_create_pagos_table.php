<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->float('monto_pago', 8, 2);

            $table->unsignedBigInteger('detalle_pago_id');
            $table->foreign('detalle_pago_id')->references('id')->on('detalles_pago')
            ->onDelete('cascade');

            $table->unsignedBigInteger('vinculacione_id');
            $table->foreign('vinculacione_id')->references('id')->on('vinculaciones')
            ->onDelete('cascade');

            $table->dateTime('fecha_pago');

            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios')
            ->onDelete('cascade');

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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pagos');
    }
}
