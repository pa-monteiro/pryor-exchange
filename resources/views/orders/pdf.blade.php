<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Orders</title>
</head>
<body>
    <h1 style="text-align:center;">PEDIDOS</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Código Pedido</th>
            <th>Código Cliente</th>
            <th>Moeda</th>
            <th>Pagamento</th>
            <th>Valor da Moeda Estrangeira</th>
            <th>Valor da Moeda Nacional</th>
            <th>Valor da Taxa</th>
            <th>Status</th>
            <th>Data</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <tr>            
            <td>{{ $order->idBoleto ?? '-' }}</td>
            <td>{{ $order->cdCliente ?? '-' }}</td>
            <td> EUR </td>
            <td> Pagamento </td>
            <td>{{ $order->valorMe ?? '-' }}</td>
            <td>{{ $order->valorMn ?? '-' }}</td>
            <td>{{ $order->valorTaxa ?? '-' }}</td>
            <td>{{ $order->idStatus ?? '-' }}</td>
            <td>{{ $order->dtVenda->format('d/m/Y H:i:s') ?? '-' }}</td>

        </tr>
        @endforeach
    </tbody>
    </table>
</body>
</html>