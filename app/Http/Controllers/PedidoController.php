<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use App\Models\Pastel;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Getting pedidos by transform method
        $pedido = Pedido::with('pedido_items')->get()->transform(function ($pedido) {

           return array(
                'cliente' => $pedido->cliente->nome,
                'items' => $pedido->pedido_items->transform(function ($item) {
                    return array(
                        'pastel' => $item->pastel->nome,
                        'preco'=>$item->preco,
                        'quantidade'=>$item->quantidade,
                        'subtotal'=>$item->subtotal
                    );
                }),
                'total' => $pedido->data_criacao,
                'data_criacao'=>$pedido->data_criacao,
            );
           
        });

        return response()->json($pedido);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PedidoRequest $request)
    {
        // dd($request->all());

        //Get items and calculate subtotal
        $items = collect($request->items)->transform(function ($item, $key) {
            $pastel = Pastel::find($item['pastel_id']);
            return array(
                'pastel_id' => $pastel->id,
                'quantidade' => $qnt = $item['quantidade'],
                'preco' => $preco = $pastel->preco,
                'subtotal' => $qnt * $preco,
            );
        });

        //Pedido data
        $pedido = array(
            'cliente_id' => $request->cliente_id,
            'total' => $items->sum('subtotal'),
            'data_criacao' => $request->data_criacao
        );

        $pedido = Pedido::create($pedido);
        $pedido->pedido_items()->createMany($items);

       (new EmailController())->sendEmail($pedido->cliente->email,$pedido);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
