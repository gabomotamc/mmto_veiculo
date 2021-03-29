<?php

namespace App\Http\Controllers;

use App\Models\ManutencaoTipo;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

class ManutencaoTipoController extends Controller
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManutencaoTipo  $manutencaoTipo
     * @return \Illuminate\Http\Response
     */
    public function show(ManutencaoTipo $manutencaoTipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManutencaoTipo  $manutencaoTipo
     * @return \Illuminate\Http\Response
     */
    public function edit(ManutencaoTipo $manutencaoTipo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManutencaoTipo  $manutencaoTipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ManutencaoTipo $manutencaoTipo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManutencaoTipo  $manutencaoTipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(ManutencaoTipo $manutencaoTipo)
    {
        //
    }

    public function getTodoDadoManutTipo(){
        return $obj = DB::table('manutencao_tipos')->orderBy('nome', 'asc')->get();       
    }//getTodoDadoManutTipo
}
