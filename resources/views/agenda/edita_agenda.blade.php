@extends('layout.master')
@section('content')

	<div class="row">
		<h3>Editar agendamento do manutenção</h3>
	</div>

	<div class="row">
		
	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	    	
	   		@include('agenda.form_edita_agendamento')	
		</div>

	</div><!-- ./ row -->  
@stop