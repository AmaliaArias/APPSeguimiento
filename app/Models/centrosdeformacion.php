<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centrosdeformacion extends Model
{
    use HasFactory;
    protected $table = 'tbl_centrosdeformacion';
    protected $primaryKey = 'NIS';
    public $timestamps = false;

    protected $fillable = [
        'Codigo',
        'Denominacion',
        'Direccion',
        'Observaciones',
        'tbl_fichasdecaracterizacion_NIS', // La FK que mencionaste
        'tbl_regionales_NIS'
    ];

    public function ficha()
    {
        return $this->belongsTo(fichasdecaracterizacion::class, 'tbl_fichasdecaracterizacion_NIS', 'NIS');
    }

    public function regional()
    {
        return $this->belongsTo(Regionales::class, 'tbl_regionales_NIS', 'NIS');
    }
}
