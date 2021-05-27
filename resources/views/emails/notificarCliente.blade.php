<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $detalhes['titulo'] ?: 'Notificação de pedido' }}</title>
</head>

<body>
    <h1>{{ $detalhes['titulo'] }}</h1>
    <br>
    <p>Estimado {{ $detalhes['pedido']->cliente->nome }}, o seu pedido foi criado com os seguintes items</p>
    <br>
    <tbody>
        @forelse ($detalhes['pedido']->pedido_items as $item)
            <tr>
                <td>{{ $item->pastel }}</td>
                <td>{{ number_format($item->preco, 2, '.', ',') }}</td>
                <td>{{ $item->quantidade }}</td>
                <td>{{ $item->subtotal }}</td>
            </tr>
        @empty
            <h3>Ops, algo correu mal.....</h3>
        @endforelse
    </tbody>
    <p>Total:{{ number_format($detalhes['pedido']->total, 2, '.', ',') }}</p>
    <br>
    <p>Gratos pela preferencia</p>

</body>

</html>
