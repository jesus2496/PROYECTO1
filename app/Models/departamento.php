<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    //use HasFactory;
    protected $table = 'departamento';
    // Desactiva las marcas de tiempo automáticas
    public $timestamps = false;
    protected $primaryKey = 'id_dep';
}
