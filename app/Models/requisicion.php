<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class requisicion extends Model
{
    //use HasFactory;
    //le especifico que quiero trabajar
    //con esa tabla
    protected $table ='requisicion';

    //ledigo que esta desactivada esa colimna
    public $timestamps = false;

    //le digo que es otro id

    protected $primaryKey='primaryKey';
    /*
    //por defecto
            //$table->id();
            //$table->timestamps();
            //esto lo estas modificando tu
            //Ids foraneos
            $table -> unsignedBigInteger('user_id');
            $table -> unsignedBigInteger('id_folio');
            //llave primaria de la tabla
            $table->bigIncrements('id_Req');
            $table->integer('cantidad');
            $table->text('descArt');
                                //00000000.00
            $table->double('preUnit',8,2);
            $table->double('importe',8,2);
    */
    protected $fillable =[
        'user_id',
        'id_folio',
        //el idReq no es necesario por que se agrega automaticamente
        'cantidad',
        'descArt',
        'preUnit',
        'importe',
        'url',
    ];


}
