<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos';
    public $timestamps = true;

    protected $primaryKey = 'id';    

    protected $fillable = [
        'id',
        'id_usuario',
        'id_veiculo',
        'id_manut_tipo',
        'data_inicio',
        'data_entrega',
        'created_at',
        'updated_at'
    ]  


    protected $dates = ['data_inicio','data_entrega']; 
}
