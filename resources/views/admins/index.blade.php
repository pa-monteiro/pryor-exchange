@extends('layouts.app')
@section('content')
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-3 text-gray-800">Admins <a href="{{ route('admins.create') }}" class="float-right btn btn-primary" ><i class="fa fa-plus mr-1"></i>Criar</a></h1>
             
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    {{-- <div class="card-header py-3"> --}}
      {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
    {{-- </div> --}}
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>E-mail</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($admins as $admin)
              <tr>
                <td>{{ $admin->email }}</td>
                <td>
                  <a href="{{ route('admins.edit', $admin->id) }}" class="btn btn-primary">
                    <i class="fa fa-pen"></i>
                    Editar
                  </a>
                  <a href="{{ route('admins.destroy', $admin->id) }}" class="btn btn-danger">
                    <i class="fa fa-trash"></i>
                    Excluir
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
@endsection