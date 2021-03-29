<table class="table table-bordered">
    <thead>
      <tr>
        <th>Data</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Versão</th>      
        <th>Placa</th>
      </tr>      
    </thead>

    <tbody>
      @if(!empty($objDetalheAgenda) && !$objDetalheAgenda->isEmpty())
      <tr>
        <th>
          {{ date('d-m-Y', strtotime($objDetalheAgenda[0]->data_entrega)) }}
        </th>
        <th>{{$objDetalheAgenda[0]->marca}}</th>
        <th>{{$objDetalheAgenda[0]->modelo}}</th>
        <th>{{$objDetalheAgenda[0]->versao}}</th>      
        <th>{{$objDetalheAgenda[0]->nro_placa}}</th>
      </tr>       
      @else
      <tr>
        <td><p>Erro não há dados de agendamento</p></td>
      </tr>
      @endif
    </tbody>

</table>

<table class="table table-bordered">
    <thead>
      <tr>
        <th colspan="5">Serviço de manutenção</th>
      </tr> 
      <tr>
        <th colspan="2">Tipo</th>
        <th colspan="3">Manutenção</th>
      </tr>     
    </thead>

    <tbody>
      @if(!empty($objDetalheServico))
      @foreach($objDetalheServico as $key => $servico)
      <tr> 
          <td colspan="2">{{$servico->tipo}}</td>
          <td colspan="3">{{$servico->nome}}</td>
      </tr>   
      @endforeach   
      @else
      <tr>
        <td><p>Erro sem dados de serviço.</p></td>
      </tr>
      @endif
    </tbody>

</table>

  <form id="excluirAgenda" class="form-inline" 
  action="{{ url('/perfil/elimina_agenda', ['idAgenda' => $objDetalheAgenda[0]->id]) }}" 
  method="post">
    @csrf <!-- {{ csrf_field() }} -->
    @method('delete') <!--{{ method_field('delete') }} -->
    <div class="form-group mb-2">

      <button id="excluirAgendaBtn" class = "btn btn-danger btn-lg" type="submit" name="excluirAgenda"  style="display: inline-block;vertical-align: top;"> Remover dados </button>  
    </div>
  </form>