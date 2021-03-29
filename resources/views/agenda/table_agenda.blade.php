<table class="table table-bordered">

  <thead>
    <th>Data</th>
    <th>Marca</th> 
    <th>Placa</th>      
    <th>Mais detalhes</th>  
    <th>Editar dados</th>
  </thead>

  <tbody>
    @if( !empty($objAgenda) && !$objAgenda->isEmpty() )
    
      @foreach($objAgenda as $key => $agenda)
      <tr class="table-active">
        <td>{{ date('d-m-Y', strtotime($agenda->data_entrega)) }}
      </td>
        <td>{{ $agenda->marca }}</td>
        <td>{{ $agenda->nro_placa }}</td>
        <td>
          <a href="{{ route('detalheAgendamento', $agenda->id) }}" >
            Ver
          </a>
        </td>
        <td>
          <a href="{{ route('verEditarAgendamento', $agenda->id) }}" >
            Editar data
          </a>
        </td>                        
       </tr>  
      @endforeach
   
    @else
      <tr class="table-active">
      <td colspan="5"> 
        <p>
          Sem dados do agendamento
        </p>
      </td>
    </tr>
    @endif

  </tbody>

</table>