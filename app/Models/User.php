<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


//esto sirve para manipular los datos 
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable 
{
    
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'Usuarios';
    public $timestamps = false;
    protected $primaryKey = 'idUsuario';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telefono',
        'departamento',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        /*'email_verified_at' => 'datetime',*/
        'password' => 'hashed',
    ];


    protected function nombre(): Attribute
    {
        return new Attribute(

            //metodo para comvertir a mayusculas la primera palabra
            //ACCESORES
            get: fn($value) =>  ucwords ($value),
            //metodo para convertir a minusculas
            //MUTADORES
            set: fn($value) =>  strtolower($value)
            
        );
    }



    //La función mantenimientos() en tu modelo User define una 
    //relación de uno a muchos (one-to-many) entre el modelo User y el modelo mantenimiento
    public function mantenimientos()
    {             
        /*
        public function mantenimientos(): Esta es una función pública en el modelo User.
        return $this->hasMany(mantenimiento::class, 'user_id', 'idUsuario');: Esta línea establece la relación.
        hasMany(mantenimiento::class, 'user_id', 'idUsuario'): Indica que un usuario puede tener muchos registros de mantenimiento.
        mantenimiento::class: Especifica el modelo relacionado, en este caso, mantenimiento.
        'user_id': Es el nombre de la columna en la tabla de mantenimiento que actúa como clave foránea.
        'idUsuario': Es el nombre de la columna en la tabla de users que actúa como clave primaria.
        */
        return $this->hasMany(mantenimiento::class, 'user_id', 'idUsuario');
    }
}
