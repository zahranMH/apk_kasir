<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Models\DetailPenjualan;
use Illuminate\Http\Request;

class PenjualanController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user_login = Auth()->user()->id;

        return view('pages.penjualan.index', [
            'penjualans_admin' => Penjualan::orderBy('created_at', 'DESC')->get(),
            'penjualans' => Penjualan::where('user_id', $user_login)->orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user_login = Auth()->user()->id;

        return view('pages.penjualan.create', [
            'penjualans_admin' => Penjualan::orderBy('created_at', 'DESC')->get(),
            'penjualans' => Penjualan::where('user_id', $user_login)->orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $pelanggan = Pelanggan::where('no_telepon', $request->no_telepon)->first();

        if($pelanggan != null) {

            $pelangganNama = $pelanggan->nama_pelanggan;
            $pelangganAlamat = $pelanggan->alamat;
            $pelangganNoTlp = $pelanggan->no_telepon;

            // CEK JIKA PELANGGAN SUDAH TERDAFTAR
            if($pelangganNama == $request->nama_pelanggan && $pelangganAlamat == $request->alamat && $pelangganNoTlp == $request->no_telepon) {

                // JIKA PELANGGAN SUDAH TERDAFTAR
                $pelangganId = $pelanggan->id;

                // user_id yang sudah login
                $user_login = Auth()->user()->id;

                 // insert penjualan
                Penjualan::create([
                    'tgl_penjualan' => now(),
                    'total_harga' => 0,
                    'jumlah_bayar' => 0,
                    'pelanggan_id' => $pelangganId,
                    'user_id' => $user_login
                ]);

                return redirect('/penjualan')->with('berhasil', 'Berhasil membuat data transaksi');
            }
        } else {
            // JIKA PELANGGAN BELUM SUDAH TERDAFTAR

                // insert pelanggan
                $validatedData = $request->validate([
                    'nama_pelanggan' => 'required|min:3|max:255',
                    'no_telepon' => 'required|min:3|max:255',
                    'alamat' => 'required'
                ]);

                $pelangganBaru = Pelanggan::create($validatedData);
                $pelangganId = $pelangganBaru->id;

                // user_id yang sudah login
                $user_login = Auth()->user()->id;

                 // insert penjualan
                Penjualan::create([
                    'tgl_penjualan' => now(),
                    'total_harga' => 0,
                    'jumlah_bayar' => 0,
                    'pelanggan_id' => $pelangganId,
                    'user_id' => $user_login
                ]);

                return redirect('/penjualan')->with('berhasil', 'Berhasil membuat data transaksi');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $total_harga = floatval($request->total_harga);
        $jumlah_bayar = floatval(str_replace('.', '', $request->jumlah_bayar));
        $kurangin = $jumlah_bayar - $total_harga;

        if($kurangin < 0 || $kurangin === 0) {

            session([
                'produks' => Produk::all(),
                'data_penjualan' => Penjualan::find($id),
                'detail_penjualans' => DetailPenjualan::where('penjualan_id', $id)->orderBy('created_at', 'desc')->get(),
                'total_semua' => DetailPenjualan::where('penjualan_id', $id)->sum('subtotal')
            ]);

            return redirect('/DetailTransaksi/' . $id)->with('info', 'Uang anda kurang');

        } else {

            $penjualan = Penjualan::find($id);

            $penjualan->update([
                'total_harga' => $total_harga,
                'jumlah_bayar' => $jumlah_bayar
            ]);

            return redirect('/penjualan')->with('berhasil', 'Berhasil Melakukan Pembayaran');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Penjualan::where('id', $id)->delete();

        DetailPenjualan::where('penjualan_id', $id)->delete();

        return redirect('/penjualan')->with('berhasil', 'Data Berhasil Dihapus');
    }
}
