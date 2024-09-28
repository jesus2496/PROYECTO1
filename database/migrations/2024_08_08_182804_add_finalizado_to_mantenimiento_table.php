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
        Schema::table('mantenimiento', function (Blueprint $table) {
            // esto crea la columna al final de todo 
            $table -> string('finalizado')->nullable();
            //esto lo crea en la posicion que tu quieras 
            //$table -> string('finalizado') -> nullable()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mantenimiento', function (Blueprint $table) {
            $table -> dropColumn('finalizado');
        });
    }
};
