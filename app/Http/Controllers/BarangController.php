<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Kategori;
use App\StokBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Barang';
        $barang = Barang::orderBy('id', 'desc')->get();
        foreach ($barang as $item) {
            $jumlah_terjual = DB::table('detail_penjualan')
                ->where('kode_barang', $item->kode_barang)
                ->sum('qty');

            $item->jumlah_terjual = $jumlah_terjual;
        }
        return view('barang.index', compact('title', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Barang';
        $kategori = Kategori::all();
        return view('barang.create', compact('title', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'unique:barang',
            'gambar_barang' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi jenis dan ukuran gambar
        ], [
            'kode_barang.unique' => 'Kode barang sudah ada',
            'gambar_barang.*' => 'Gambar harus berupa file gambar dengan format jpeg, png, jpg, atau gif dan tidak lebih dari 2MB'
        ]);

        $input = $request->except('gambar_barang'); // Mengambil semua input kecuali gambar_barang

        if ($request->hasFile('gambar_barang')) {
            $gambar_barang = $request->file('gambar_barang');
            $gambar_barang_name = time() . '.' . $gambar_barang->getClientOriginalExtension();
            $gambar_barang->move('photo', $gambar_barang_name); // Menyimpan gambar ke direktori public/photo/
            $input['gambar_barang'] = $gambar_barang_name; // Menyimpan nama gambar ke dalam array input
        }

        Barang::create($input);
        return redirect('/barang')->with('success', 'Data barang berhasil tersimpan');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Barang';
        $barang = Barang::find($id);
        $kategori = Kategori::all();
        return view('barang.edit', compact('title', 'barang', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = Barang::find($id);
        if (!$barang) {
            return redirect('/barang')->with('error', 'Barang tidak ditemukan.');
        }

        // Validasi input
        $request->validate([
            'kode_barang' => 'required|unique:barang,kode_barang,' . $barang->id,
            'gambar_barang' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi jenis dan ukuran gambar
        ], [
            'kode_barang.required' => 'Kode barang harus diisi',
            'kode_barang.unique' => 'Kode barang sudah ada',
            'gambar_barang.*' => 'Gambar harus berupa file gambar dengan format jpeg, png, jpg, atau gif dan tidak lebih dari 2MB'
        ]);

        // Mengupdate atribut-atribut barang
        $barang->kode_barang = $request->kode_barang;
        $barang->kategori_id = $request->kategori_id;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_ecer = $request->harga_ecer;
        $barang->harga_grosir = $request->harga_grosir;
        $barang->harga_agen = $request->harga_agen;
        $barang->profit_harga_ecer = $request->profit_harga_ecer;
        $barang->harga_custom = $request->harga_custom;
        $barang->profit_harga_custom = $request->profit_harga_custom;
        $barang->harga_customb = $request->harga_customb;
        $barang->profit_harga_customb = $request->profit_harga_customb;
        $barang->harga_customc = $request->harga_customc;
        $barang->profit_harga_customc = $request->profit_harga_customc;
        $barang->harga_customd = $request->harga_customd;
        $barang->profit_harga_customd = $request->profit_harga_customd;
        $barang->harga_custome = $request->harga_custome;
        $barang->profit_harga_custome = $request->profit_harga_custome;
        $barang->harga_customf = $request->harga_customf;
        $barang->profit_harga_customf = $request->profit_harga_customf;
        $barang->harga_customg = $request->harga_customg;
        $barang->profit_harga_customg = $request->profit_harga_customg;
        $barang->profit_harga_grosir = $request->profit_harga_grosir;
        $barang->profit_harga_agen = $request->profit_harga_agen;
        $barang->deskripsi = $request->deskripsi;
        $barang->stok = $request->stok;
        $barang->stok_minimal = $request->stok_minimal;

        // Jika ada gambar yang diupload, proses gambar tersebut
        if ($request->hasFile('gambar_barang')) {
            // Hapus gambar lama jika ada
            if ($barang->gambar_barang) {
                // Pastikan path ke gambar yang lama sesuai dengan yang Anda gunakan di server Anda
                unlink('photo/' . $barang->gambar_barang);
            }

            // Simpan gambar yang baru diupload
            $gambar_barang = $request->file('gambar_barang');
            $ubah_nama_gambar_barang = time() . '_' . $gambar_barang->getClientOriginalName();
            $gambar_barang->move('photo', $ubah_nama_gambar_barang);

            // Simpan nama gambar baru ke dalam atribut barang
            $barang->gambar_barang = $ubah_nama_gambar_barang;
        }

        // Simpan perubahan
        $barang->save();

        return redirect('/barang')->with('success', 'Data barang berhasil terupdate');

        // baru
        // $barang = Barang::find($id);
        // if (!$barang) {
        //     return redirect('/barang')->with('error', 'Barang tidak ditemukan.');
        // }

        // // Validasi input
        // $request->validate([
        //     'kode_barang' => 'required|unique:barang,kode_barang,' . $barang->id,
        //     'gambar_barang' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        // ], [
        //     'kode_barang.required' => 'Kode barang harus diisi',
        //     'kode_barang.unique' => 'Kode barang sudah ada',
        //     'gambar_barang.image' => 'Gambar harus berupa file gambar',
        //     'gambar_barang.mimes' => 'Format gambar harus jpeg, png, jpg, atau gif',
        //     'gambar_barang.max' => 'Ukuran gambar tidak boleh lebih dari 2MB'
        // ]);

        // // Update data barang
        // $barang->fill($request->except('gambar_barang'));

        // // Proses gambar jika ada
        // if ($request->hasFile('gambar_barang')) {
        //     if ($barang->gambar_barang && file_exists(public_path('photo/' . $barang->gambar_barang))) {
        //         unlink(public_path('photo/' . $barang->gambar_barang));
        //     }

        //     $gambar_barang = $request->file('gambar_barang');
        //     $ubah_nama_gambar_barang = time() . '_' . $gambar_barang->getClientOriginalName();
        //     $gambar_barang->move(public_path('photo'), $ubah_nama_gambar_barang);

        //     $barang->gambar_barang = $ubah_nama_gambar_barang;
        // }

        // $barang->save();

        // return redirect('/barang')->with('success', 'Data barang berhasil terupdate');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang')->with('success', 'Data barang berhaszil terhapus');
    }
}
