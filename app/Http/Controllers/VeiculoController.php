<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sesionUsuario = Auth::user();
        $idUsuario = $sesionUsuario->id;

        $objVeiculo = DB::table('veiculos')->where('id_usuario', '=', $idUsuario)
        ->orderBy('marca', 'asc')->get();
        return view( 'veiculo.veiculo', compact('objVeiculo') );
    }//index

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'veiculo.criar_veiculo' );
    }// create

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'codigo_vin' => 'required',
            'nro_placa' => 'required',
            'cor' => 'required',
            'marca' => 'required',
            'modelo' => 'required', 
            'versao' => 'required',
            'ano' => 'required'                                   
        ];

        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'O campo :attribute é obrigatório.',
        ]);     

        if ($validator->fails()) { 
            $errors = $validator->errors();
            return back()->withErrors($errors);
        }           

        $sesionUsuario = Auth::user();
        $idUsuario = $sesionUsuario->id;
                
        $storeVeiculo = new Veiculo;
        $storeVeiculo->id_usuario = $idUsuario;
        $storeVeiculo->cod_vin = $request->input('codigo_vin');
        $storeVeiculo->nro_placa = $request->input('nro_placa');
        $storeVeiculo->cor = $request->input('cor');
        $storeVeiculo->marca = $request->input('marca');            
        $storeVeiculo->modelo = $request->input('modelo');
        $storeVeiculo->versao = $request->input('versao'); 
        $storeVeiculo->ano = $request->input('ano');                             
        $storeVeiculo->save();

        $msj = 'Você registrou seu veículo: '.$request->marca.' '.$request->modelo;
        return redirect()->route('indexVeiculo')->with('success', $msj); 
    }// store

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Veiculo $veiculo,$idVei)
    {    
        $objVeiculo = DB::table('veiculos')->where('id', '=', $idVei)->get();
        return view( 'veiculo.detalhe_veiculo', compact('objVeiculo') );     
    }//show

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Veiculo $veiculo, $idVei)
    {
        $objVeiculo = DB::table('veiculos')->where('id', '=', $idVei)->get();
        return view( 'veiculo.edita_veiculo', compact('objVeiculo') );
    }//edit

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Veiculo $veiculo,$idVei)
    {

        $rules = [
            'codigo_vin' => 'required',
            'nro_placa' => 'required',
            'cor' => 'required',
            'marca' => 'required',
            'modelo' => 'required', 
            'versao' => 'required',
            'ano' => 'required'                                   
        ];

        $validator = Validator::make($request->all(), $rules, $messages = [
            'required' => 'O campo :attribute é obrigatório.',
        ]);     

        if ($validator->fails()) { 
            $errors = $validator->errors();
            return back()->withErrors($errors);
        }  
                
        $update = Veiculo::where('id', $idVei)->update( 
            ['cod_vin' => $request->codigo_vin, 
            'nro_placa' => $request->nro_placa,
            'cor' => $request->cor,
            'marca' => $request->marca,
            'modelo' => $request->modelo,            
            'versao' => $request->versao,
            'ano' => $request->ano,
            ] 
        );
        return redirect()->route('indexVeiculo')->with('success', 'Alterações salvas.');  
    }// update

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veiculo $veiculo,$idVei)
    {
        Veiculo::where('id', $idVei)->delete();
        return redirect()->route('indexVeiculo')->with('success', 'Dados eliminado.'); 
    }

    public function getDadoVeiculoCampoValor($campo,$valor){
        return $obj = Veiculo::where($campo, $valor)->get();        
    }//getDadoVeiculoCampoValor
}
