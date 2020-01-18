@extends('layouts.app')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Moedas</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    {{-- <div class="card-header py-3"> --}}
      {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
    {{-- </div> --}}
    <div class="card-body">
        <form method="POST">
          @csrf

          @method('patch')

          <div class="form-group">
            <label for="currency">Moeda</label>
            <input type="text" name="currency" class="form-control" value="{{ $tax->currency }}">
          </div>

          <div class="form-group">
            <label for="value">Valor</label>
            <input type="text" name="value" class="form-control" value="{{ $tax->value }}">
          </div>

          <div class="form-group">
            <button class="btn btn-primary float-right">Salvar</button>
          </div>
        </form>
    </div>
  </div>

</div>
@endsection