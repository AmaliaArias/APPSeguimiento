<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol', // 'admin' o 'aprendiz'
        'aprendiz_nis', // FK opcional hacia tbl_aprendiz
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Relación con el perfil de Aprendiz
     * Solo se usará si el usuario tiene el rol 'aprendiz'
     */
    public function perfilAprendiz()
    {
        return $this->belongsTo(Aprendiz::class, 'aprendiz_nis', 'NIS');
    }

    // Función para verificar si es admin rápidamente
    public function isAdmin() {
        return $this->rol === 'admin';
    }
}
