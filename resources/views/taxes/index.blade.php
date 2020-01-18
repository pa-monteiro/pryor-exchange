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
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Moeda</th>
              <th>Taxa</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($taxes as $tax)
              <tr>
                <td>{{ $tax->currency }}</td>
                <td>R$ {{ $tax->formattedValue }}</td>
                <td>
                  <a href="{{ route('taxes.edit', $tax->id) }}" class="btn btn-primary">
                    <i class="fa fa-edit"></i>
                    Editar
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