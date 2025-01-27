<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'especialidad',
        'correo',
        'telefono',
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class);
    }


}


