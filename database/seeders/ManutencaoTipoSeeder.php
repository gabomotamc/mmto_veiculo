<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ManutencaoTipoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$hoyDateTime = Carbon::now()->format('Y-m-d H:i:s');
		$dato = [
		    ['tipo'=>'Preventivo', 'nome'=> 'Mude o óleo do motor', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
		    ['tipo'=>'Corretivo', 'nome'=> 'Troque o filtro de óleo', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
		    ['tipo'=>'Preventivo', 'nome'=> 'Verifique a pressão dos pneus', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
			['tipo'=>'Preventivo', 'nome'=> 'Verifique o filtro de ar', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
			['tipo'=>'Corretivo', 'nome'=> 'Gire os pneus e equilibre-os', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
			['tipo'=>'Corretivo', 'nome'=> 'Verifique e corrija o alinhamento do veículo', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
		    ['tipo'=>'Preventivo', 'nome'=> 'Revisar los amortiguadores', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
		    ['tipo'=>'Preventivo', 'nome'=> 'Verifique o refrigerante', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
		    ['tipo'=>'Preventivo', 'nome'=> 'Verifique o status da bateria', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
		    ['tipo'=>'Preventivo', 'nome'=> 'Revisar los faros', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
		    ['tipo'=>'Preventivo', 'nome'=> 'Verifique o fluido da direção hidráulica', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
		    ['tipo'=>'Preventivo', 'nome'=> 'Verifique o fluido de transmissão', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],
		    ['tipo'=>'Preventivo', 'nome'=> 'Verifique o fluido de freio', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime], 
		    ['tipo'=>'Preventivo', 'nome'=> 'Verifique as bandas e tiras', 'detalhe'=> 'Detalhe','created_at' => $hoyDateTime , 'updated_at' => $hoyDateTime],   
		];

		DB::table('manutencao_tipos')->insert($dato);
    }// run
}// ManutencaoTipoSeeder
