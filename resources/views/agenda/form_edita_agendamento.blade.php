<form id="editarAgendaForm"  action="{{ route('editarAgendamento', $objAgenda[0]->id) }}" method="POST" >
	@csrf <!-- {{ csrf_field() }} -->
	@method('PUT')

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

	</div>
	<!-- row -->	
	
	<div class="row">
		<div class="col">
			<button type="submit" class="btn btn-success">Editar agendamento</button>
		</div>
	</div>
	
</form>