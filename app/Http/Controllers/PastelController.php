<?php

namespace App\Http\Controllers;

use App\Http\Requests\PastelRequest;
use App\Models\Pastel;
use Illuminate\Http\Request;

class PastelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Pastel::get()->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PastelRequest $request)
    {
        $foto = $request->file('foto')->store('pasteis');
        $pastel = Pastel::create($request->all());
        $pastel->foto = $foto;
        $pastel->save();
        return response()->json($pastel);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pastel  $pastel
     * @return \Illuminate\Http\Response
     */
    public function show($pastel)
    {
        $pastel = Pastel::findOrFail($pastel);
        return response()->json($pastel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pastel  $pastel
     * @return \Illuminate\Http\Response
     */
    public function edit(Pastel $pastel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pastel  $pastel
     * @return \Illuminate\Http\Response
     */
    public function update(PastelRequest $request,Pastel $pastel)
    {
        // $pastel = Pastel::findOrFail($pastel);
        $foto = $request->file('foto')->store('pasteis');
        $request['foto'] = $foto;
        $pastel->update($request->all());
        return response()->json($pastel);
    }

    /**
     * Remove the specified resource from storage.
     *
     *  $pastel
     * @return \Illuminate\Http\Response
     */
    public function destroy($pastel)
    {
        $pastel = Pastel::findOrFail($pastel);
        return response()->json($pastel->delete());
    }
}
