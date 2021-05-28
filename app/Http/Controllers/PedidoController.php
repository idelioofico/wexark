<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use App\Models\Pastel;
use App\Models\Pedido;
use Database\Seeders\PedidoSeeder;
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
                'íd' => $pedido->id,
                'cliente' => $pedido->cliente->nome,
                'pedido_items' => $pedido->pedido_items->transform(function ($item) {
                    return array(
                        'pastel' => $item->pastel->nome,
                        'preco' => $item->preco,
                        'quantidade' => $item->quantidade,
                        'subtotal' => $item->subtotal
                    );
                }),
                'total' => $pedido->data_criacao,
                'data_criacao' => $pedido->data_criacao,
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
        $pedidoItems = collect($request->items)->transform(function ($item, $key) {
            $pastel = Pastel::find($item['pastel_id']);
            return array(
                'pastel_id' => $pastel->id,
                'quantidade' => $qnt = $item['quantidade'],
                'preco' => $preco = $pastel->preco,
                'subtotal' => $qnt * $preco,
            );
        });

        //Pedido data
        $pedidoData = array(
            'cliente_id' => $request->cliente_id,
            'total' => $pedidoItems->sum('subtotal'),
            'data_criacao' => $request->data_criacao
        );

        //Create pedido
        $pedido = Pedido::create($pedidoData);

        //Store pedidoITems using relationship
        $items=$pedido->pedido_items()->createMany($pedidoItems);

        //Send mail to cliente notifying pedido
        //(new EmailController())->enviarNotificacao($pedido->cliente->email, $pedido);

        //Returning data using Show($pedido) method
       return $this->show($pedido->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::where('id', $id)->with('pedido_items')->get()->transform(function ($pedido) {

            return array(
                'cliente' => $pedido->cliente->nome,
                'pedido_items' => $pedido->pedido_items->transform(function ($item) {
                    return array(
                        'pastel' => $item->pastel->nome,
                        'preco' => $item->preco,
                        'quantidade' => $item->quantidade,
                        'subtotal' => $item->subtotal
                    );
                }),
                'total' => $pedido->data_criacao,
                'data_criacao' => $pedido->data_criacao,
            );
        });


        // $pedido=Pedido::find($pedido);

        return response()->json($pedido);
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
    public function destroy($id)
    {
        //Get the pedido
        $pedido = Pedido::findOrfail($id);

        //First, softdelete all its pedido_items
        foreach ($pedido->pedido_items as $item) {
            $item->delete();
        };
        //then delete the parent record
        return response()->json($pedido->delete());
    }
}
