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
        Schema::create('requisicion', function (Blueprint $table) {
            //por defecto
            //$table->id();
            //$table->timestamps();
            //esto lo estas modificando tu
            //Ids foraneos
            $table -> unsignedBigInteger('user_id');
            $table -> unsignedBigInteger('id_folio')->nullable();//este valor pudee ser nullos
            //llave primaria de la tabla
            $table->bigIncrements('id_Req');
            $table->integer('cantidad');
            $table->text('descArt');
                                //00000000.00
            $table->double('preUnit',8,2);
            $table->text('url')->nullable();
            $table->double('importe',8,2);
            
            //llaves foraneas
            $table -> foreign('user_id') -> references('idUsuario') -> on ('Usuarios');
            $table -> foreign('id_folio') -> references('idFolio') -> on ('mantenimiento')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requisicion');
    }
};
