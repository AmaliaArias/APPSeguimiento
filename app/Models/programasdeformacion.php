<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programasdeformacion extends Model
{

    use HasFactory;
    protected $table = 'tbl_programasdeformacion';

    protected $primaryKey = 'NIS';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'Codigo',
        'Denominacion',
        'Observaciones',

    ];
    //


    public  function ficha()

    {
        return $this->hasMany(fichasdecaracterizacion::class);

    }
}
