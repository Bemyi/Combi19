<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXpasajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('viaje_id')->constrained('viajes');
            $table->foreignId('pasajero_id')->constrained('pasajeros');
            $table->foreignId('tarjeta_id')->nullable()->constrained('tarjetas');
            $table->double('precio_viaje');
            $table->double('precio');
            $table->foreignId('estado')->constrained('estados');
            $table->string('estado_covid');
            $table->string('estado_pago');
            $table->foreignId('reembolso_id')->nullable()->constrained('reembolsos');
            $table->foreignId('comprador_id')->constrained('pasajeros');
            $table->softDeletes();
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
        Schema::dropIfExists('pasajes');
    }
}
