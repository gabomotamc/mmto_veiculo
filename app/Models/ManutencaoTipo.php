<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManutencaoTipo extends Model
{
    use HasFactory;

	protected $table = 'manutencao_tipos';
	public $timestamps = true;

	protected $primaryKey = 'id';

	protected $fillable = [
	    'tipo',
	    'nombre',
	    'detalhe',
	    'created_at',
	    'updated_at'
	]      
}
