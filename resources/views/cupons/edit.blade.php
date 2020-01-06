@extends('layouts.app')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Cupons</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    {{-- <div class="card-header py-3"> --}}
      {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
    {{-- </div> --}}
    <div class="card-body">
        <form method="POST" action={{ route('cupons.update', $cupom->id ) }}>
          @csrf
          @method('put')
          <div class="form-group">
            <label for="currency">Cupom</label>
            <input type="text" name="cupom" required class="form-control" value="{{ $cupom->cupom }}">
          </div>

          <div class="form-group">
            <label for="value">Porcentagem</label>
          <input type="text" name="porcentagem" required class="form-control" value="{{ $cupom->porcentagem }}">
          </div>
          <div class="form-group">
            <label for="data_fim">Data Fim</label>
            <input type="date" name="data_fim" required class="form-control" value="{{ $cupom->data_fim }}">
          </div>

          <div class="form-group">
            <button class="btn btn-primary float-right">Salvar</button>
          </div>
        </form>
    </div>
  </div>

</div>
@endsection