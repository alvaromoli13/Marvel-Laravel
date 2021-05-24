<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonajeGuardadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personaje_guardados', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('favorito')->nullable();//nulo 
            $table->unsignedInteger('idUsuario');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->unsignedInteger('idPersonaje');
            $table->foreign('idPersonaje')->references('id')->on('personajes');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personaje_guardados');
    }
}
