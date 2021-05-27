<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $detalhes['titulo'] ?: 'Confirmaçao de pedido' }}</title>



    <style>
        #items {
          font-family: Arial, Helvetica, sans-serif;
          border-collapse: collapse;
          width: 50%;
        }
        
        #items td, #items th {
          border: 1px solid #ddd;
          padding: 8px;
        }
        
        #items tr:nth-child(even){background-color: #f2f2f2;}
        
        #items tr:hover {background-color: #ddd;}
        
        #items th {
          padding-top: 12px;
          padding-bottom: 12px;
          text-align: left;
          background-color: #04AA6D;
          color: white;
        }
        </style>
</head>

<body>
    <h1>{{ $detalhes['titulo'] }}</h1>
    <br>
    <p>Estimado {{ $detalhes['pedido']->cliente->nome }}, o seu pedido foi criado com os seguintes items</p>
    <br>
    <table id="items">
        <thead>
            <tr>
                <th>Pastel</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($detalhes['pedido']->pedido_items as $item)
                <tr>
                    <td>{{ $item->pastel->nome }}</td>
                    <td>{{ number_format($item->preco, 2, '.', ',') }}</td>
                    <td>{{ $item->quantidade }}</td>
                    <td>{{ $item->subtotal }}</td>
                </tr>
            @empty
                <h3>Ops, algo correu mal.....</h3>
            @endforelse
        </tbody>
    </table>
    <p><strong>Total: &ThickSpace;</strong>{{ number_format($detalhes['pedido']->total, 2, '.', ',') }} &ThickSpace;</p>
    <br>
    <p>Gratos pela preferencia</p>

</body>

</html>
