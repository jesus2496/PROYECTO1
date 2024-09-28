<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Usuarios', function (Blueprint $table) {
            
            $table->bigIncrements('idUsuario');
            $table->string('name');
            $table->string('telefono');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('departamento');
            //$table->foreign('id_dep')->references('id_dep') -> on('departamento');
            //$table ->string('prueba');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Usuarios');
    }
};
