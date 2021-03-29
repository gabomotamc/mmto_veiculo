<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $table = 'veiculos';
    public $timestamps = true;

    protected $primaryKey = 'id';    

    protected $fillable = [
        'id',
        'id_usuario',
        'cod_vin',
        'nro_placa',
        'cor',
        'marca',
        'modelo',
        'versao',
        'ano',        
        'created_at',
        'updated_at'
    ];   
      
}
