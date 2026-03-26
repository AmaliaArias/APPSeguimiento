<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacoras extends Model
{
    use HasFactory;

    protected $table = 'tbl_bitacoras';
    public $timestamps = false;

    // Campos que permitimos llenar masivamente
    protected $fillable = [
        'numero_bitacora',
        'fechainicio',
        'fechafin',
        'descripcion_actividades',
        'evidencias',
        'observaciones_instructor',
        'estado',
        'tbl_aprendiz_NIS',
        'tbl_fichasdecaracterizacion_NIS'
    ];

    // Relación: Una bitácora pertenece a un aprendiz


    public function aprendiz()
    {
        return $this->belongsTo(Aprendiz::class, 'tbl_aprendiz_NIS', 'NIS');
    }

    // Relación: Una bitácora pertenece a una ficha
    public function ficha()
    {
        return $this->belongsTo(Fichasdecaracterizacion::class, 'tbl_fichasdecaracterizacion_NIS', 'Codigo');
    }
}
