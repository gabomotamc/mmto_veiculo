<table class="table table-bordered">

  <thead>
    <th>Cód VIN</th>
    <th>Placa</th> 
    <th>Marca</th>      
    <th>Mais detalhes</th>  
    <th>Editar dados</th>
  </thead>

  <tbody>
    @if( !empty($objVeiculo) && !$objVeiculo->isEmpty() )
    
      @foreach($objVeiculo as $key => $veiculo)
      <tr class="table-active">
        <td>{{ $veiculo->cod_vin }}</td>
        <td>{{ $veiculo->nro_placa }}</td>
        <td>{{ $veiculo->marca }}</td>
        <td>
          <a href="{{ route('detalleVeiculo', $veiculo->id) }}" >
            Ver
          </a>
        </td>
        <td>
          <a href="{{ route('verEditarVeiculo', $veiculo->id) }}" >
            Ver
          </a>
        </td>                        
       </tr>  
      @endforeach
   
    @else
      <tr class="table-active">
      <td colspan="5"> 
        <p>
          Sem dados do veículo
        </p>
      </td>
    </tr>
    @endif

  </tbody>

</table>