@if( !empty($objVeiculo) )
<table class="table table-bordered">
  <tbody>
    <tr>
      <th colspan="2">Cód VIN</th>
      <th>Placa</th>
    </tr>

    <tr>
      <td colspan="2">{{ $objVeiculo[0]->cod_vin }}</td>
      <td>{{ $objVeiculo[0]->nro_placa }}</td>      
    </tr>

    <tr>
      <th>Marca</th>
      <th>Modelo</th>
      <th>Versão</th>
    </tr>     

    <tr>
      <td>{{ $objVeiculo[0]->marca }}</td>
      <td>{{ $objVeiculo[0]->modelo }}</td>
      <td>{{ $objVeiculo[0]->versao }}</td>
    </tr> 

    <tr>
      <th colspan="3">Ano</th>
    </tr>
      <td colspan="3">{{ $objVeiculo[0]->ano }}</td>
    <tr>
      
    </tr>

    @else
      <tr class="table-active">
      <td colspan="3"> 
        <p>
          Sem dados
        </p>
      </td>
    </tr>
    @endif

  </tbody>

</table>

  <form id="excluirVeiculo" class="form-inline" 
  action="{{ url('/perfil/elimina_veiculo', ['idVei' => $objVeiculo[0]->id]) }}" 
  method="post">
    @csrf <!-- {{ csrf_field() }} -->
    @method('delete') <!--{{ method_field('delete') }} -->
    <div class="form-group mb-2">

      <button id="excluirVeiculoBtn" class = "btn btn-danger btn-lg" type="submit" name="excluirVeiculo"  style="display: inline-block;vertical-align: top;"> Remover dados </button>  
    </div>
  </form>