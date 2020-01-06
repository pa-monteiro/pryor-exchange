@extends('layouts.app')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-2 text-gray-800">Pedidos</h1>
    {{-- <a href="{{ route('orders.report', request()->input()) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Gerar Relatório</a> --}}
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="card-title">Filtros</div>

      <form action="">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="startDate">Data inicial</label>
              <input type="date" name="startDate" class="form-control" value="{{ $startDate }}">
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="endDate">Data final</label>
              <input type="date" name="endDate" class="form-control" value="{{ $endDate }}">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label for="cdProduto">Moeda</label>
              <input type="text" name="cdProduto" class="form-control" value="{{ $cdProduto }}">
            </div>
          </div>

          <div class="col-md-2">
            <div class="form-group">
              <label for="idboleto">Código Pedido</label>
              <input type="text" name="idboleto" class="form-control" value="{{ $idboleto }}">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="cdClienteFisica">Cliente (pessoas físicas)</label>
              <select name="cdClienteFisica" id="cdClienteFisica" class="form-control">
                <option value="">Todos</option>
                @foreach ($customers as $customer)
                  <option {{ $customer->id == $cdClienteFisica ? 'selected' : '' }} value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="cdClienteJuridica">Cliente (pessoas jurídicas)</label>
              <select name="cdClienteJuridica" id="cdClienteJuridica" class="form-control">
                <option value="">Todos</option>
                @foreach ($companies as $company)
                  <option {{ $company->id == $cdClienteJuridica ? 'selected' : '' }} value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="col-md-4">
            <div class="form-group">
              <label for="dsStatus">Status</label>
              <select name="dsStatus" id="dsStatus" class="form-control">
                <option value="">Todos</option>
                @foreach ($statuses as $id => $status)
                  <option {{ $id == $dsStatus ? 'selected' : '' }} value="{{ $id }}">{{ $status }}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary float-right ml-1">Filtrar &nbsp;<i class="fa fa-search"></i></button>
            <a href="{{ route('orders.pdf') }}" class="btn btn-danger float-right ml-1">PDF&nbsp;<i class="fa fa-file-pdf"></i></a>
            <a href="{{ route('orders.excel') }}" class="btn btn-success float-right">XLS &nbsp;<i class="fa fa-file-excel"></i></a>
          </div>
          
        </div>
      </form>
    </div>
  </div>
  <div class="card shadow mb-4">

    <div class="card-body">
      {{ $orders->appends(request()->input())->links() }}
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Código pedido</th>
              <th>Código cliente</th>
              <th>Moeda</th>
              <th>Pagamento</th>
              <th>Valor da Moeda Estrangeira</th>
              <th>Valor da Moeda Nacional</th>
              <th>Valor da Taxa</th>
              <th>Status</th>
              <th>Data</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
              <tr>
                <td>{{ $order->idboleto }}</td>
                <td>{{ $order->cdCliente }}</td>
                <td>{{ $order->cdProduto }}</td>
                <td>{{ $order->cdTipoCliente }}</td>
                <td>{{ $order->valorMe }}</td>
                <td>{{ $order->valorMn }}</td>
                <td>{{ $order->valorTaxa }}</td>
                <td>{{ config('statuses.' . $order->dsStatus) }}</td>
                <td>{{ $order->dtVenda->format('H:i:s d/m/Y') }}</td>
                <td>
                  <a href="{{ route('orders.edit', $order->idboleto) }}" class="btn btn-primary">
                    <i class="fa fa-search"></i>
                    Detalhes
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        {{ $orders->appends(request()->input())->links() }}
      </div>
    </div>
  </div>

</div>
@endsection