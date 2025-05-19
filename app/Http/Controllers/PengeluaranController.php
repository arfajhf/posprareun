<?php

namespace App\Http\Controllers;

use App\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pengeluaran';
        $pengeluaran = Pengeluaran::orderBy('id', 'desc')->get();
        return view('pengeluaran.index', compact('title', 'pengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($no_pengeluaran)
    {
        $title = 'Pengeluaran';
        return view('pengeluaran.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengeluaran::create($request->all());
        return redirect('/pengeluaran')->with('success', 'Data pengeluaran berhasil tersimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        $title = 'Pengeluaran';
        return view('pengeluaran.edit', compact('title', 'pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $pengeluaran->no_pengeluaran = $request->no_pengeluaran;
        $pengeluaran->nama = $request->nama;
        $pengeluaran->jumlah = $request->jumlah;
        $pengeluaran->keterangan = $request->keterangan;
        $pengeluaran->save();
        return redirect('/pengeluaran')->with('success', 'Data pengeluaran berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengeluaran  $pengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect('/pengeluaran')->with('success', 'Data pengeluaran berhasil terhapus');
    }
}
