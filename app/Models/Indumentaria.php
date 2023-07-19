<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Indumentaria extends Model
{
    protected $fillable=[
        'imagen',
        'nombre',
        'descripcion',
        'estado',
        'precio',
        'id_categoria',
    ];

    use HasFactory;
}
