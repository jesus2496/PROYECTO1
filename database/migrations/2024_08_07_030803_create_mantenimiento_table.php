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
        Schema::create('mantenimiento', function (Blueprint $table) {
            $table -> unsignedBigInteger('user_id');
            $table -> bigIncrements('idFolio');
            $table -> string('modelo');
            $table->date('fecha');
            $table->time('hora');
            $table -> string('descripcion');
            $table -> foreign('user_id') ->  references ('idUsuario') -> on ('Usuarios');
            //$table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mantenimiento');
    }
};
