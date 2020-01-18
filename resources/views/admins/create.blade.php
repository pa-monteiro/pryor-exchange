@extends('layouts.app')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Criar um Admin</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    {{-- <div class="card-header py-3"> --}}
      {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
    {{-- </div> --}}
    <div class="card-body">
    <form method="POST" action="{{ route('admins.store') }}">
          @csrf
          <div class="form-group">
            <label for="email">E-mail</label>
            <input type="text" name="email" class="form-control">
          </div>

          <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" class="form-control" >
          </div>

          <div class="form-group">
            <button class="btn btn-primary float-right">Salvar</button>
          </div>
        </form>
    </div>
  </div>

</div>
@endsection