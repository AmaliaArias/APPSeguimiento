<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class instructor extends Model
{
    use HasFactory, Notifiable; // Agregué HasFactory que es común

    protected $table = 'tbl_instructor';

    protected $primaryKey = 'NIS';

    public $timestamps = false;

    // Cambiado a false porque NIS probablemente no es autoincremental
    public $incrementing = false;

    // Especificar que la clave primaria no es un entero (si es string)
    protected $keyType = 'string'; // O 'int' si es numérico

    protected $fillable = [
        'NIS',
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
        // Agregadas las claves foráneas si pueden ser asignadas masivamente
        'tbl_rolesadministrativos_NIS',
        'tbl_eps_NIS',
        'tbl_tiposdocumentos_NIS',
    ];

    /**
     * Relación con fichas de caracterización
     */
    public function fichas()
    {
        // Usar el nombre completo de la clase con namespace
        return $this->hasMany(Fichasdecaracterizacion::class, 'instructor_NIS', 'NIS');
    }

    /**
     * Relación con roles administrativos
     */
    public function rol()
    {
        // Especificar la clave foránea y la clave local
        return $this->belongsTo(Rolesadministrativos::class, 'tbl_rolesadministrativos_NIS', 'NIS');
    }

    /**
     * Relación con EPS
     */
    public function eps()
    {
        return $this->belongsTo(Eps::class, 'tbl_eps_NIS', 'NIS');
    }

    /**
     * Relación con tipos de documento
     */
    public function tipoDocumento()
    {
        return $this->belongsTo(Tiposdocumentos::class, 'tbl_tiposdocumentos_NIS', 'NIS');
    }

    /**
     * Route notifications for mail channel
     */
    public function routeNotificationForMail($notification)
    {
        return $this->CorreoPersonal;
    }
}
