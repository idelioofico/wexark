<?php

namespace App\Http\Controllers;

use App\Http\Requests\PastelRequest;
use App\Models\Pastel;
use App\Services\PastelService;

class PastelController extends Controller
{

    protected $service;

    public function __construct(PastelService $service)
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
     * @param  \Illuminate\Http\PastelRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PastelRequest $request)
    {
        $pastel = $this->service->store($request);
        return response()->json($pastel);
    }

    /**
     * Display the specified resource.
     *
     * @param int  $pastel
     * @return \Illuminate\Http\Response
     */
    public function show($pastel)
    {
        return response()->json($this->service->find($pastel));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PastelRequest  $request
     * @param  int  $icliente
     * @return \Illuminate\Http\Response
     */
    public function update(PastelRequest $request, $pastel)
    {
        return response()->json($this->service->update($request, $pastel));
    }

    /**
     * Remove the specified resource from storage.
     *
     *  $pastel
     * @return \Illuminate\Http\Response
     */
    public function destroy($pastel)
    {
        return response()->json($this->service->delete($pastel));
    }
}
