<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('combi_id')->constrained('combis');
            $table->foreignId('chofer_id')->constrained('choferes');
            $table->foreignId('ruta_id')->constrained('rutas');
            $table->double('precio');
            $table->dateTime('fecha');
            $table->foreignId('estado')->constrained('estados');
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
        Schema::dropIfExists('viajes');
    }
}
