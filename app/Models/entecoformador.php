<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entecoformador extends Model
{
    use HasFactory;
    protected $table = 'tbl_entecoformador';

    protected $primaryKey = 'NIS';

    public $timestamps = false;

    public $incrementing = true;

    protected $fillable = [
        'Tdoc',
        'Numdoc',
        'RazonSocial',
        'Direccion',
        'Telefono',
        'CorreoInstitucional'
    ];


    // En app/Models/Entecoformador.php

    public function tipoDocumento()
    {
        // Asumiendo que tu modelo se llama Tiposdocumentos y la llave foránea es Tdoc
        return $this->belongsTo(Tiposdocumentos::class, 'Tdoc', 'NIS');
    }

}

