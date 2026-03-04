<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aprendiz extends Model
{
    use HasFactory;
    protected $table = 'tbl_aprendiz';

    protected $primaryKey = 'NIS';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'Tdoc',
        'Numdoc',
        'Nombres',
        'Apellidos',
        'Direccion',
        'Telefono',
        'CorreoInstitucional',
        'CorreoPersonal',
        'Sexo',
        'FechaNacimiento'
    ];
}



