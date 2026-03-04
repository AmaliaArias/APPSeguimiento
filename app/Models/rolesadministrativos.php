<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rolesadministrativos extends Model
{
    use HasFactory;
    protected $table = 'tbl_rolesadministrativos';

    protected $primaryKey = 'NIS';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'Descripcion',
        'anexo_camara',

    ];
}
