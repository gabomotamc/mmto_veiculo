<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicoAgendado extends Model
{
    use HasFactory;

	protected $table = 'servico_agendados';
	public $timestamps = true;

	protected $primaryKey = 'id';

	protected $fillable = [
	    'id_agendamento',
	    'id_manut_tipo',
	    'created_at',
	    'updated_at'
	];

}
