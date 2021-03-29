<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

	Route::get('/', function () {
	    return view('usuario.login');
	});

	## Usuario ##
	Route::get('/login',
		[UsuarioController::class, 'index'] 
	)->name('loginUsuario');

	Route::post('/auth_usuario',
		[UsuarioController::class, 'autenticarLogin']
	)->name('autenticaUsuario ');	

	Route::get('/cadastro_usuario',
		[UsuarioController::class, 'create'] 
	)->name('criarUsuario');

	Route::post('/store_usuario',
		[UsuarioController::class, 'store']
	)->name('salvarUsuario ');	

	Route::get('/perfil/salir',
		[UsuarioController::class, 'fecharSessao']
	)->name('fecharSessao')->middleware('auth');		

	## Veículo ##
	Route::get('/perfil/veiculo',
		[VeiculoController::class, 'index'] 
	)->name('indexVeiculo')->middleware('auth');

	Route::get('/perfil/criar_veiculo',
		[VeiculoController::class, 'create'] 
	)->name('criarVeiculo')->middleware('auth');

	Route::post('/perfil/store_veiculo',
		[VeiculoController::class, 'store']
	)->name('salvarVeiculo ')->middleware('auth');	

	Route::get('/perfil/detalle_veiculo/{idVei}',
		[VeiculoController::class, 'show']
	)->name('detalleVeiculo')->middleware('auth');

	Route::get('/perfil/ver_edita_veiculo/{idVei}',
		[VeiculoController::class, 'edit']
	)->name('verEditarVeiculo')->middleware('auth');

	Route::put('/perfil/edita_veiculo/{idVei}',
		[VeiculoController::class, 'update']
	)->name('editarVeiculo')->middleware('auth');

	Route::delete('/perfil/elimina_veiculo/{idVei}',
		[VeiculoController::class, 'destroy']
	)->name('removerVeículo')->middleware('auth');		

	## Agendamento ##
	Route::get('/perfil/agendamento',
		[AgendamentoController::class, 'index'] 
	)->name('indexAgendamento')->middleware('auth');

	Route::get('/perfil/criar_agendamento',
		[AgendamentoController::class, 'create'] 
	)->name('criarAgendamento')->middleware('auth');

	Route::post('/perfil/store_agendamento',
		[AgendamentoController::class, 'store']
	)->name('salvarAgendamento')->middleware('auth');	

	Route::get('/perfil/detalhe_agenda/{idAgenda}',
		[AgendamentoController::class, 'show']
	)->name('detalheAgendamento')->middleware('auth');

	Route::get('/perfil/ver_edita_agenda/{idAgenda}',
		[AgendamentoController::class, 'edit']
	)->name('verEditarAgendamento')->middleware('auth');

	Route::put('/perfil/edita_agenda/{idAgenda}',
		[AgendamentoController::class, 'update']
	)->name('editarAgendamento')->middleware('auth');

	Route::delete('/perfil/elimina_agenda/{idAgenda}',
		[AgendamentoController::class, 'destroy']
	)->name('removerAgenda')->middleware('auth');				

		
