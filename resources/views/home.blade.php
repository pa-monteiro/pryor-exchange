@extends('layouts.app')

@section('content')
<div class="container-fluid">
 <div id="app">
    <charts></charts>
  </div>
</div>

@endsection

@section('scripts')
<!-- Page level plugins -->
<script src="{{ asset('js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('js/chart-area-demo.js') }}"></script>
<script src="{{ asset('js/chart-pie-demo.js') }}"></script>

<script src="js/app.js"></script>
@endsection