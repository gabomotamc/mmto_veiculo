<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    public $timestamps = true;

    protected $primaryKey = 'id';    

    protected $fillable = [
        'id',
        'correio_eletro',
        'senha',
        'nome',
        'sobrenome',
        'aniversario',
        'created_at',
        'updated_at'
    ]    
    
    protected $dates = ['aniversario']; 
}
