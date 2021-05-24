<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioPeliculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario__peliculas', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('favorito')->nullable();//nulo 
            $table->unsignedInteger('idUsuario');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->unsignedInteger('idPelicula');
            $table->foreign('idPelicula')->references('id')->on('peliculas');
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
        Schema::dropIfExists('usuario__peliculas');
    }
}
