<form id="criarAgendaForm"  action="{{ url('/perfil/store_agendamento') }}" method="POST" >
	@csrf <!-- {{ csrf_field() }} -->

	<div class="row">
		<label for="manut_tipo" class="form-label">
			Que manutenção você quer fazer?
		</label>

		<div  class="col">
			@if( !$objManut->isEmpty() )
			<select id="manutServicoMultiple" class="form-select" name="manut_tipo[]" multiple="multiple" aria-label="Default select example" required="required">
				  <option value="">Selecionar</option>
				  @foreach($objManut as $key => $manut)
				  	<option value="{{$manut->id}}">{{$manut->nome}}</option>
				  @endforeach
			</select>
			@else
			<p>Não há opções de manutenção</p>
			@endif
		</div>

	</div>

	<div class="row">

		<!-- Data entrega -->
		<div class="col">
			<label for="data_entrega" class="form-label">
				Datas disponíveis para manutenção
			</label>
			<input id="dataEntrega" class="form-control" type="date" 
			name="data_entrega"  required="required" min="{{ $hoyDate }}" aria-describedby="dataEntregaHelp">
			<div id="dataEntregaHelp" class="form-text"></div> 
		</div>

		<div  class="col">
			<label for="manut_tipo" class="form-label">
				Para que veículo?
			</label>
			@if( !$objVeiUsuario->isEmpty() )
			<select name="id_veiculo" class="form-select" aria-label="Default select example" required="required">
				  <option value="">Selecionar </option>
				  @foreach($objVeiUsuario as $key => $veiculo)
				  	<option value="{{$veiculo->id}}">{{$veiculo->marca}} - {{$veiculo->modelo}} - {{$veiculo->nro_placa}}</option>
				  @endforeach
			</select>
			@else
			<p>Não há opções de veículo</p>
			@endif
		</div>

	</div>
	<!-- row -->	

	<div class="row">
		<divclass="col">
		@if($objVeiUsuario->isEmpty())
			<div class="alert alert-warning">
				<p>Não há veículos cadastrados, por favor, cadastre-se pelo menos um.</p>
			</div>
		@else
			<button type="submit" class="btn btn-success">Registrar agendamento</button>
		@endif
		</div>
	</div>
	
</form>