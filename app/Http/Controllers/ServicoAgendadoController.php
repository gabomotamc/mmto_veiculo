<?php

namespace App\Http\Controllers;

use App\Models\ServicoAgendado;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;


class ServicoAgendadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function storeFromAgendamento($idAgendamento,$arrIdManutTipo){

        $hoyDateTime = Carbon::now()->format('Y-m-d H:i:s');
        $dato = [];
        foreach ($arrIdManutTipo as $key => $idManutTipo) {
        $dato[] = array('id_agendamento' => $idAgendamento,
            'id_manut_tipo' => $idManutTipo,
            'created_at' => $hoyDateTime,
            'updated_at' => $hoyDateTime,
            );
        }// foreach
        DB::table('servico_agendados')->insert($dato);
        /*$storeServico = new ServicoAgendado;
        $storeServico->id_agendamento = $idAgendamento;
        $storeServico->id_manut_tipo  = $idManutTipo;
        $storeServico->save();*/

    }//storeFromAgendamento

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServicoAgendado  $servicoAgendado
     * @return \Illuminate\Http\Response
     */
    public function show(ServicoAgendado $servicoAgendado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServicoAgendado  $servicoAgendado
     * @return \Illuminate\Http\Response
     */
    public function edit(ServicoAgendado $servicoAgendado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServicoAgendado  $servicoAgendado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServicoAgendado $servicoAgendado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServicoAgendado  $servicoAgendado
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicoAgendado $servicoAgendado)
    {
        //
    }

    public function getDetalheAgendaInfoServico($idAgenda){

        return $obj = DB::table('servico_agendados')
        ->join('manutencao_tipos', 'servico_agendados.id_manut_tipo', '=', 'manutencao_tipos.id')
        ->select('manutencao_tipos.tipo', 'manutencao_tipos.nome' )
        ->where('servico_agendados.id_agendamento', '=', $idAgenda)
        ->orderBy('manutencao_tipos.nome', 'asc')
        ->get(); 

    }//getDetalheAgendaInfoServico
}
