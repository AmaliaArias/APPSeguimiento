<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entecoformador extends Model
{
    use HasFactory;
    protected $table = 'tbl_entecoformador';

    protected $primaryKey = 'NIS';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'Tdoc',
        'Numdoc',
        'RazonSocial',
        'Direccion',
        'Telefono',
        'CorreoInstitucional'
    ];
}
