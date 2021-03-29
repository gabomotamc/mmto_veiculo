<form id="criarVeiculoForm"  action="{{ route('editarVeiculo', $objVeiculo[0]->id) }}" method="POST" >
	@csrf <!-- {{ csrf_field() }} -->
	@method('PUT')
	<div class="row">

		<!-- Código VIN -->
		<div class="col">
			<label for="codigo_vin" class="form-label">Código VIN (número de identificação do veículo)</label>
			<input id="codVin" class="form-control" type="text" name="codigo_vin" 
			placeholder="Digitar VIN. Por exemplo: QWE123ZXZCASD1231" title ="17 caracteres." minlength="17" maxlength="17" required="required" value="{{ $objVeiculo[0]->cod_vin }}" aria-describedby="codVinHelp">
			<div id="codVinHelp" class="form-text"></div> 
		</div>

		<!-- Nro de placa -->
		<div class="col">
			<label for="nro_placa" class="form-label">Placa</label>
			<input id="nroPlaca" class="form-control" type="text" name="nro_placa" 
			placeholder="Por exemplo: ASD-2021 ou por exemplo: ASD2021" title ="" minlength="7" maxlength="8" required="required" value="{{ $objVeiculo[0]->nro_placa }}" aria-describedby="nroPlacaHelp">
			<div id="nroPlacaHelp" class="form-text"></div> 
		</div>

	</div>
	<!-- row -->

	<div class="row">
		<div class="col">
			<label for="marca" class="form-label">Marca</label>
			<input id="marca" class="form-control" type="text" name="marca" 
			placeholder="Digitar número do marca do veículo " title ="" minlength="3" maxlength="50" required="required" value="{{ $objVeiculo[0]->marca }}" aria-describedby="marcaHelp">
			<div id="marcaHelp" class="form-text"></div> 			
		</div>

		<div class="col">
			<label for="modelo" class="form-label">Modelo</label>
			<input id="modelo" class="form-control" type="text" name="modelo" 
			placeholder="Digitar modelo placa do veículo " title ="" minlength="3" maxlength="50" required="required" value="{{ $objVeiculo[0]->modelo }}" aria-describedby="marcaHelp">
			<div id="modeloHelp" class="form-text"></div>    			
		</div>
	</div>
	<!-- row -->

	<div class="row">

		<div class="col">
			<label for="versao" class="form-label">Versão</label>
			<input id="versao" class="form-control" type="text" name="versao" 
			placeholder="Digitar versao do veículo " title ="" minlength="3" maxlength="20" required="required" value="{{ $objVeiculo[0]->versao }}" aria-describedby="versaoHelp">
			<div id="versaoHelp" class="form-text"></div>   
		</div>

		<div class="col">
			<label for="cor" class="form-label">Cor do corpo</label>
			<input id="corCorpo" class="form-control" type="text" name="cor" 
			placeholder="Digitar cor do veículo" title ="" minlength="3" maxlength="20" required="required" value="{{ $objVeiculo[0]->cor }}" aria-describedby="corCorpoHelp">
			<div id="corCorpoHelp" class="form-text"></div> 
		</div>

		<div class="col">
			<label for="ano" class="form-label">Ano veículo</label>
			<input id="ano" class="form-control" type="text" name="ano" 
			placeholder="Por exemplo: 21 ou 2021" title ="" minlength="2" maxlength="4" required="required" value="{{ $objVeiculo[0]->ano }}" aria-describedby="anoHelp">
			<div id="anoHelp" class="form-text"></div>  			
		</div>
		
	</div>
	<!-- row -->	

	<div class="row">
		<divclass="col">
			<button type="submit" class="btn btn-success">Salvar</button>
		</div>
	</div>
	
</form>