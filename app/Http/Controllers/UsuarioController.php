<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view( 'usuario.login' ); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( 'usuario.cadastro' );        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'correio' => 'required',
            'senha' => 'required',
            'nome' => 'required',
            'sobrenome' => 'required',
        ]);

        $objUsuario = Usuario::where('correio_eletro', $request->correio)->get();
        if(!$objUsuario->isEmpty()){
            $msjError = '¡Já existe uma conta com o e-mail ('.$request->correio.'). Por favor, registre-se com outro e-mail!';   
            return back()->withErrors($msjError);
        }    

        $usuario = new Usuario;
        
        $usuario->correio_eletro = $request->input('correio');
        $usuario->senha = Hash::make($request->senha);
        $usuario->nome =  $request->input('nome');
        $usuario->sobrenome =  $request->input('sobrenome');   

        $usuario->save();
        
        $success = 'Você se registrou com sucesso. Agora você pode fazer o login com o e-mail: ('.$request->correio.').';
        return redirect()->route('loginUsuario')->with('success', $success);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function getDadoAgendaUsuario(){

        $sesionUsuario = Auth::user();
        $idUsuario = $sesionUsuario->id;
        return $obj = DB::table('usuarios')
        ->join('veiculos', 'usuarios.id', '=', 'veiculos.id_usuario')
        ->join('agendamentos', 'veiculos.id', '=', 'agendamentos.id_veiculo')
        ->select('usuarios.nome', 'veiculos.marca', 'veiculos.nro_placa',
            'agendamentos.data_entrega', 'agendamentos.id' )
        ->where('usuarios.id', '=', $idUsuario)
        ->orderBy('agendamentos.data_entrega', 'asc')
        ->limit(7)
        ->get(); 
        
    }// getDadoAgendaUsuario

    public function autenticarLogin(Request $request)
    {

        $request->validate([
            'correio' => 'required',
            'senha' => 'required',
        ]);

        $credencial = array(
            'correio' => $request->input('correio'), 
            'senha' => $request->input('senha')
        );

        $objUsuario = Usuario::where('correio_eletro', $request->correio)->get();

        if ($objUsuario->isEmpty()) {
            return back()->withErrors('Usuário não existe');
        }else{

            if (Hash::check($request->senha, $objUsuario[0]->senha ))
            {

                Auth::loginUsingId($objUsuario[0]->id);
                $sesion = Auth::user();
                return redirect()->route('indexAgendamento');
               
            }else{

                return back()->withErrors('Senha é incorreta');

            }// else  

        }// else     

    }// autenticarLogin    

    public function fecharSessao(){
        Auth::logout();
        $success = 'Você saiu com sucesso';
        return redirect()->route('loginUsuario')->with('success', $success);       
    }
}// 
