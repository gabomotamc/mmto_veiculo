@extends('layout.master')
@section('content')

	<div class="row">
		<h3>Manutenção de veículos</h3>
	</div>

	<div class="row">
		@if($errors->any())
		    <div class="alert alert-danger">
		        @foreach($errors->all() as $error)
		            <p>{{ $error }}</p>
		        @endforeach
		    </div>
		@endif
		@if (!empty($success))
		    <div class="alert alert-success">
		        <p>{{ $success }}</p>
		    </div>
		@endif		
	    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">	    	
	   		...	
		</div>

	    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			...
		</div>
	</div><!-- ./ row -->  
@stop