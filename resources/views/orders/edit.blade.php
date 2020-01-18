@extends('layouts.app')
@section('content')
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Pedido #{{ $order->idBoleto }}</h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <table class="table table-borderless">
        Dados do Cliente
        <hr>
        @if($order->cdTipoCliente == 'f')
        <tr>
          <th>Nome Completo</th>
          <td>{{ $order->client->nome_completo }}</td>
        </tr>
        <tr>
          <th>RG</th>
          <td>{{ $order->client->ident_numero }}</td>
        </tr>
        <tr>
          <th>Data de Nascimento</th>
          <td>{{ $order->client->data_nascimento }}</td>
        </tr>
        <tr>
          <th>Feminino/Masculino</th>    
          <td>{{ $order->cdTipoCliente == 'F'  ? 'Feminino' : 'Masculino' }}</td>
        </tr>
        <tr>
          <th>Profissão</th>
          <td>{{ $order->client->profissao }}</td>
        </tr>
        <tr>
          <th>Nome da Mãe</th>
          <td>{{ $order->client->nome_mae }}</td>
        </tr>
        <tr>
          <th>Tipo de endereço</th>
          <td>{{ $order->client->tipoendereco }}</td>
        </tr>
        <tr>
          <th>CEP</th>
          <td>{{ $order->client->cep }}</td>
        </tr>
        <tr>
          <th>Endereço</th>
          <td>{{ $order->client->endereco }}</td>
        </tr>
        <tr>
          <th>Numero</th>
          <td>{{ $order->client->numero_end }}</td>
        </tr>
        <tr>
          <th>Complemento</th>
          <td>{{ $order->client->complemento }}</td>
        </tr>
        <tr>
          <th>Estado</th>
          <td>{{ $order->client->uf_end ?? 'Não preenchido' }}</td>
        </tr>
        <tr>
          <th>Cidade</th>
          <td>{{ $order->client->cidade }}</td>
        </tr>
        <tr>
          <th>Bairro</th>
          <td>{{ $order->client->bairro }}</td>
        </tr>
        <tr>
          <th>E-mail</th>
          <td>{{ $order->client->email }}</td>
        </tr>
        <tr>
          <th>Telefone</th>
          <td>{{ $order->client->telefonefixo }}</td>
        </tr>
        <tr>
          <th>Celular</th>
          <td>{{ $order->client->celular }}</td>
        </tr>
        @else
        <tr>
          <th>Razão Social</th>
          <td>{{ $order->client->razao_social }}</td>
        </tr>
        <tr>
          <th>CNPJ</th>
          <td>{{ $order->client->cnpj }}</td>
        </tr>
        <tr>
          <th>Endereço</th>
          <td>{{ $order->client->endereco }}</td>
        </tr>
        <tr>
          <th>Número</th>    
          <td>{{ $order->client->numero }}</td>
        </tr>
        <tr>
          <th>Complemento</th>
          <td>{{ $order->client->complemento }}</td>
        </tr>
        <tr>
          <th>Bairro</th>
          <td>{{ $order->client->bairro }}</td>
        </tr>
        <tr>
          <th>CEP</th>
          <td>{{ $order->client->cep_end }}</td>
        </tr>
        <tr>
          <th>Cidade</th>
          <td>{{ $order->client->cidade }}</td>
        </tr>
        <tr>
          <th>Estado</th>
          <td>{{ $order->client->uf_end }}</td>
        </tr>
        <tr>
          <th>E-mail</th>
          <td>{{ $order->client->email }}</td>
        </tr>
        <tr>
          <th>Telefone Comercial</th>
          <td>{{ $order->client->tel_comercial }}</td>
        </tr>
        <tr>
          <th>Celular</th>
          <td>{{ $order->client->celular }}</td>
        </tr>
        <tr>
          <th>Responsável</th>
          <td>{{ $order->client->responsavel }}</td>
        </tr>
        <tr>
          <th>Cargo</th>
          <td>{{ $order->client->cargo }}</td>
        </tr>
        <tr>
          <th>CPF</th>
          <td>{{ $order->client->cpf }}</td>
        </tr>
        <tr>
          <th>Termo</th>
          <td>{{ $order->client->termo == 1 ? 'Sim' :  'Não' }}</td>
        </tr>        
        @endif
      </table>
    </div> 
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <table class="table table-borderless">
        Endereço de entrega
        <hr>
        <tr>
          <th>Tipo de endereço</th>
          <td>{{ $order->entrega->principal == 'S' ? 'Principal' : 'Alternativo' }}</td>
        </tr>
        <tr>
          <th>CEP</th>
          <td>{{ $order->entrega->cep_end ?? 'Não preenchido' }}</td>
        </tr>
        <tr>
          <th>Endereço</th>
          <td>{{ $order->entrega->endereco }}</td>
        </tr>
        <tr>
          <th>Numero</th>    
          <td>{{ $order->entrega->numero_end }}</td>
        </tr>
        <tr>
          <th>Estado</th>
          <td>{{ $order->entrega->uf_end }}</td>
        </tr>
        <tr>
          <th>Cidade</th>
          <td>{{ $order->entrega->cidade }}</td>
        </tr>
        <tr>
          <th>Bairro</th>
          <td>{{ $order->entrega->bairro }}</td>
        </tr>       
      </table>
    </div> 
  </div>
  <div class="card shadow mb-4">
    <div class="card-body">
      <table class="table table-borderless">
        Documentos
        <hr>
        
      </table>
    </div> 
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <table class="table table-borderless">
        Dados da Operação
        <hr>
        <tr>
          <th>Quantidade</th>
          <td>{{ $order->valorMe }}</td>
        </tr>
        <tr>
          <th>Taxa</th>
          <td>{{ $order->valorTaxa }}</td>
        </tr>
        <tr>
          <th>Valor MN</th>
          <input class="money" id="input" type="hidden">
          <td id="value">{{ $order->valorMn }}</td>
        </tr>
        <tr>
          <th>IOF</th>    
          <td>{{ $order->iof }}</td>
        </tr>
        <tr>
          <th>Taxa c/ IOF</th>
          @php $taxaiof = $order->iof + $order->valorTaxa @endphp
          <td>{{ $taxaiof }}</td>
        </tr>
        <tr>
          <th>Forma de Entrega ME</th>
          <td>{{ $order->cdFormaEntregaMe }}</td>
        </tr>
        <tr>
          <th>Liquidação ME (data da operação)</th>
          <td>{{ $order->dtVenda->format('d/m/Y') }}</td>
        </tr> 
        <tr>
          <th>Liquidação MN (data da operação)</th>
          <td>{{ $order->dtVenda->format('d/m/Y') }}</td>
        </tr>      
      </table>
    </div> 
  </div>
  <div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST">
          @csrf

          @method('patch')

          <div class="form-group">
            <label for="dsStatus">Alterar Status</label>
            <select name="dsStatus" id="dsStatus" class="form-control">
                @foreach ($statuses as $id => $status)
                  <option value="{{ $id }}">{{ $status }}</option>
                @endforeach
            </select>
          </div>       
            <a href="{{ $order->idBoleto .'/pendentes' }}" value="1" name="enviado" style="margin-left:40%;" class="text-center btn btn-success">Enviado</a>           
            <button class="btn btn-primary float-right">Alterar Status</button>
        </form>
    </div>
  </div>

</div>
@endsection
<script>
$(document).ready(function(){
   $('.money').mask('000.000.000.000.000,00', {reverse: true});
  
  $(".money").change(function(){
    $("#value").html($(this).val().replace(/\D/g,''))
  })
  
});
</script>