<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Services\ClienteService;

class ClienteController extends Controller
{

    protected $service;

    public function __construct(ClienteService $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->service->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        return response()->json($this->service->store($request));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show($cliente)
    {
        return response()->json($this->service->find($cliente));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ClienteRequest  $request
     * @param  int  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $cliente)
    {
        return response()->json($this->service->update($request, $cliente));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($cliente)
    {
        return response()->json($this->service->delete($cliente));
    }
}
