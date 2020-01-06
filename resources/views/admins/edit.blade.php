@extends('layouts.app')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Admins</h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    {{-- <div class="card-header py-3"> --}}
      {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
    {{-- </div> --}}
    <div class="card-body">
        <form method="POST" action={{ route('admins.update', $admin->id ) }}>
          @csrf
          @method('put')
          <div class="form-group">
            <label for="currency">E-mail</label>
            <input type="text" name="email" class="form-control" value="{{ $admin->email }}">
          </div>

          <div class="form-group">
            <label for="value">Senha</label>
            <input type="password" name="senha" class="form-control">
          </div>

          <div class="form-group">
            <button class="btn btn-primary float-right">Salvar</button>
          </div>
        </form>
    </div>
  </div>

</div>
@endsection