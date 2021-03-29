<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\ManutencaoTipoController;
use App\Http\Controllers\ServicoAgendadoController;

use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;

class AgendamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarioRel = new UsuarioController;
        $objAgenda = $usuarioRel->getDadoAgendaUsuario();             

        /*$objAgenda = DB::table('agendamentos')->orderBy('data_entrega', 'asc')->get();*/
        return view( 'agenda.agenda', compact('objAgenda') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $sesionUsuario = Auth::user();
        $idUsuario = $sesionUsuario->id;
        // Veiculos do usuario
        $veiculo = new VeiculoController;
        $objVeiUsuario = $veiculo->getDadoVeiculoCampoValor('id_usuario',$idUsuario);

        // Manutencao
        $manutencao = new ManutencaoTipoController;
        $objManut = $manutencao->getTodoDadoManutTipo();

        //Fecha actual
        $hoyDate = Carbon::now()->format('Y-m-d');

        return view( 'agenda.criar_agendamento',compact('objVeiUsuario'),compact('objManut') )->with('hoyDate',$hoyDate );
    }// create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'manut_tipo' => ['required'],         
            'data_entrega' => ['required'],
            'id_veiculo' => ['required'],

        ]); //validator        

        $arrIdManutTipo = $request->manut_tipo;
         // Save agendamento
        $storeAgenda = new Agendamento;
        $storeAgenda->id_veiculo = $request->input('id_veiculo');
        $storeAgenda->data_entrega = $request->input('data_entrega');                    
        $storeAgenda->save();

        $idAgendamento = $storeAgenda->id;
        // Insert servico agendado
        $servico = new ServicoAgendadoController;
        $servico->storeFromAgendamento($idAgendamento,$arrIdManutTipo);

        $msj = 'Você registrou un novo agendamento';
        return redirect()->route('indexAgendamento')->with('success', $msj);         
    }// store

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function show(Agendamento $agendamento, $idAgenda)
    {
        $servico = new ServicoAgendadoController;
        $objDetalheServico = $servico->getDetalheAgendaInfoServico($idAgenda);

        $objDetalheAgenda = $this->getDetalheAgendaInfoAgenda($idAgenda);
        return view( 'agenda.detalhe_agenda', compact('objDetalheServico'), compact('objDetalheAgenda') );     
    }// store

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function edit(Agendamento $agendamento, $idAgenda)
    {
        $objAgenda = DB::table('agendamentos')->where('id', '=', $idAgenda)->get();
        //Fecha actual
        $hoyDate = Carbon::now()->format('Y-m-d');
        return view( 'agenda.edita_agenda', compact('objAgenda') )->with('hoyDate',$hoyDate );
    }// edit


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agendamento $agendamento, $idAgenda)
    {

        $validator = Validator::make($request->all(), [
       
            'data_entrega' => ['required'],
                          
        ]); //validator  

        $update = Agendamento::where('id', $idAgenda)->update( 
            ['data_entrega' => $request->data_entrega, ] 
        );
        return redirect()->route('indexAgendamento')->with('success', 'Alterações salvas.'); 
    }// update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendamento $agendamento,$idAgenda)
    {
        Agendamento::where('id', $idAgenda)->delete();
        return redirect()->route('indexAgendamento')->with('success', 'Dados eliminado.');        
    }

    public function getDetalheAgendaInfoAgenda($idAgenda){

        return $obj = DB::table('agendamentos')
        ->join('veiculos', 'agendamentos.id_veiculo', '=', 'veiculos.id')
        ->select('agendamentos.id','agendamentos.data_entrega', 'veiculos.marca', 'veiculos.modelo', 'veiculos.versao', 'veiculos.nro_placa' )
        ->where('agendamentos.id', '=', $idAgenda)
        ->get(); 

    }//getDetalheAgendaInfoAgenda

}
