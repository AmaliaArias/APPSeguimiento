<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regionales extends Model
{
    use HasFactory;
    protected $table = 'tbl_regionales';

    protected $primaryKey = 'NIS';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'Codigo',
        'Denominacion',
        'Observaciones',
    ];

}


