<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichasdecaracterizacion extends Model
{
    use HasFactory;
    protected $table = 'tbl_fichasdecaracterizacion';
    protected $primaryKey = 'NIS';
    public $timestamps = false;
    public $incrementing = true;

    protected $fillable = [
        'NIS',
        'Codigo',
        'Denominacion',
        'Cupo',
        'FechaInicio',
        'FechaFin',
        'Observaciones',
        'tbl_centrosdeformacion_NIS', // Agrégalos al fillable
        'tbl_programasdeformacion_NIS',
        'tbl_instructor_NIS'
    ];

    // Relación con el Centro de Formación
    public function centro()
    {
        return $this->belongsTo(Centrosdeformacion::class, 'tbl_centrosdeformacion_NIS', 'NIS');
    }

    // Relación con el Programa de Formación
    public function programa()
    {
        return $this->belongsTo(Programasdeformacion::class, 'tbl_programasdeformacion_NIS', 'NIS');
    }

    public function instructor()
    {
        return $this->belongsTo(instructor::class, 'tbl_instructor_NIS', 'NIS');

    }



}
