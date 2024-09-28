<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mantenimiento extends Model
{
    protected $table = 'mantenimiento';
    // Desactiva las marcas de tiempo automáticas
    public $timestamps = false;
    protected $primaryKey = 'idFolio';
    //protected $dates = ['fecha']; // Asegúrate de que la fecha se maneje como un objeto de fecha


    //para ingresar datos de forma masiva 
    
    protected $fillable = [
        'user_id',
        'modelo',
        'fecha',
        'hora',
        'descripcion',
    ];


    /*
    La relación que hay  en tu modelo mantenimiento
    es una relación de muchos a uno. 
    Esto significa que muchos registros de mantenimiento pueden estar asociados a un solo usuario.
    */

    public function usuario()
    {
        /*
        
        public function usuario(): Esta es una función pública en el modelo mantenimiento.
        return $this->belongsTo(User::class, 'user_id', 'idUsuario');: Esta línea establece la relación.
        belongsTo(User::class, 'user_id', 'idUsuario'): Indica que cada registro de mantenimiento pertenece a un usuario.
        User::class: Especifica el modelo relacionado, en este caso, User.
        'user_id': Es el nombre de la columna en la tabla de mantenimiento que actúa como clave foránea.
        'idUsuario': Es el nombre de la columna en la tabla de users que actúa como clave primaria.
        */
        return $this->belongsTo(User::class, 'user_id', 'idUsuario');
    }

}
