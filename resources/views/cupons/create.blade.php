@extends('layouts.app')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Criar um Cupom</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    {{-- <div class="card-header py-3"> --}}
      {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
    {{-- </div> --}}
    <div class="card-body">
    <form method="POST" action="{{ route('cupons.store') }}">
          @csrf
          <div class="form-group">
            <label for="email">Cupom</label>
            <input type="text" name="cupom" class="form-control">
          </div>

          <div class="form-group">
            <label for="porcentagem">Porcentagem</label>
          <input type="text" name="porcentagem" class="form-control">
          </div>
          <div class="form-group">
            <label for="data_fim">Data Fim</label>
            <input type="date" name="data_fim" class="form-control">
          </div>

          <div class="form-group">
            <button class="btn btn-primary float-right">Salvar</button>
          </div>
        </form>
    </div>
  </div>

</div>
@endsection