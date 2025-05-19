<?php

namespace App\Http\Controllers;

use App\Barang;
use App\DetailPembelian;
use App\DetailPenjualan;
use App\Pembelian;
use App\Kategori;
use App\StokBarang;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Pembelian Barang';
        $detail_pembelian = DetailPembelian::orderBy('id', 'desc')->get();
        return view('pembelian_barang.index', compact('title', 'detail_pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($no_pembelian)
    {
        $title = 'Pembelian Barang';
        $barang = Barang::all();
        $supplier = Supplier::all();
        $ambil_pembelian_sekarang = DB::table('pembelian')
            ->join('barang', 'pembelian.kode_barang', 'barang.kode_barang')
            ->select('pembelian.*', 'barang.nama_barang')
            ->where('pembelian.no_pembelian', $no_pembelian)
            ->orderBy('pembelian.id', 'desc')
            ->get();
        return view('pembelian_barang.create', compact('title', 'supplier', 'barang', 'ambil_pembelian_sekarang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $update_stok_barang = Barang::where('kode_barang', $request->kode_barang)->first();
        $update_stok_barang->stok = $update_stok_barang->stok + $request->qty;
        $update_stok_barang->save();

        Pembelian::create($request->all());
        return redirect('/pembelian/create/' . $request->no_pembelian)->with('success', 'Data pembelian barang berhasil tersimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembelian  $pembelian_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pembelian_barang = Pembelian::find($id);

        $update_stok_barang = Barang::where('kode_barang', $pembelian_barang->kode_barang)->first();
        $update_stok_barang->stok = $update_stok_barang->stok - $pembelian_barang->qty;
        $update_stok_barang->save();

        $pembelian_barang->delete();
        return redirect('/pembelian/create/' . $pembelian_barang->no_pembelian)->with('success', 'Data pembelian barang berhasil terhapus');
    }

    public function simpan_detail_pembayaran(Request $request)
    {
        DetailPembelian::create($request->all());
        return redirect('/pembelian')->with('success', 'Pembelian berhasil tersimpan');
    }

    public function detail($no_pembelian)
    {
        $title = 'Pembelian Barang';
        $pembelian = DetailPembelian::where('no_pembelian', $no_pembelian)->first();
        $detail_pembelian = DB::table('pembelian')
            ->join('barang', 'pembelian.kode_barang', 'barang.kode_barang')
            ->select('pembelian.*', 'barang.nama_barang')
            ->where('pembelian.no_pembelian', $no_pembelian)
            ->orderBy('pembelian.id', 'desc')
            ->get();
        return view('pembelian_barang.detail', compact('title', 'detail_pembelian', 'pembelian'));
    }

    public function download($no_pembelian)
    {
        $title = 'Pembelian Barang';
        $pembelian = DetailPembelian::where('no_pembelian', $no_pembelian)->first();
        $detail_pembelian = DB::table('pembelian')
            ->join('barang', 'pembelian.kode_barang', 'barang.kode_barang')
            ->select('pembelian.*', 'barang.nama_barang')
            ->where('pembelian.no_pembelian', $no_pembelian)
            ->orderBy('pembelian.id', 'desc')
            ->get();
        $pdf = PDF::loadView('pembelian_barang.download', compact('title', 'detail_pembelian', 'pembelian'));
        return $pdf->download('Detail Pembelian.pdf');
    }
}
