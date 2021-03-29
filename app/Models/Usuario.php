<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Usuario extends Model implements AuthenticatableContract, CanResetPasswordContract
{use Authenticatable, CanResetPassword;
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
    ];   
    
    protected $dates = ['aniversario']; 
}
