<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\bitacoras;

class Aprendiz extends Model
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
        'FechaNac',
        'tbl_fichasdecaracterizacion_NIS',
        'tbl_tiposdocumentos_NIS',
        'tbl_eps_NIS'
    ];

    /**
     * Relación con el Tipo de Documento
     */
    public function tipoDocumento()
    {
        // Pertenece a un Tipo de Documento usando la FK tbl_tiposdocumentos_NIS
        return $this->belongsTo(Tiposdocumentos::class, 'tbl_tiposdocumentos_NIS', 'NIS');
    }

    /**
     * Relación con la Ficha de Caracterización
     */
    public function ficha()
    {
        return $this->belongsTo(Fichasdecaracterizacion::class, 'tbl_fichasdecaracterizacion_NIS', 'NIS');
    }

    /**
     * Relación con la EPS
     */
    public function eps()
    {
        return $this->belongsTo(Eps::class, 'tbl_eps_NIS', 'NIS');
    }
    public function bitacoras()
    {
        // Esto le dice a Laravel que un Aprendiz tiene muchas Bitácoras
        // Ajusta 'tbl_aprendiz_NIS' si el nombre de la columna en tu tabla bitacoras es diferente
        return $this->hasMany(Bitacoras::class, 'tbl_aprendiz_NIS', 'NIS');
    }

}
