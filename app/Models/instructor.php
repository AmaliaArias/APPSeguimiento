<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class instructor extends Model
{
    use Notifiable;
    protected $table = 'tbl_instructor';

    protected $primaryKey = 'NIS';

    public $timestamps = false;

    public $incrementing = true;

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
    ];


    public function ficha()
    {
        return $this->hasMany(fichasdecaracterizacion::class);
    }

    public function routeNotificationForMail($notification)
    {
        return $this->CorreoPersonal;
    }
}


