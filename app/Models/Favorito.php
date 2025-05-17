<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $table = 'favoritos';
    protected $primaryKey = 'Id';
    public $timestamps = false;

    protected $fillable = [
        'Id_Usuario',
        'Id_Carta',
        'Nombre',
        'Imagen',
        'Coleccion',
    ];
}
