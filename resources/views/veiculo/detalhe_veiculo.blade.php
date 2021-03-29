@extends('layout.master')
@section('content')

	<div class="row">
		<h3>Meus veículos</h3>
	</div>

	<div class="row">	
	    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">	    	
	   		@include('veiculo.table_detalhe_veiculo')	
		</div>
	</div><!-- ./ row -->  
@stop