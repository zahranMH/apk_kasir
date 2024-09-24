<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.penjualan.index', [
            'penjualans' => Penjualan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.penjualan.create', [
            'penjualans' => Penjualan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // insert pelanggan
        $validatedData = $request->validate([
            'nama_pelanggan' => 'required|min:3|max:255',
            'no_telepon' => 'required|min:3|max:255',
            'alamat' => 'required'
        ]);

        $pelanggan = Pelanggan::create($validatedData);
        $pelangganId = $pelanggan->id;

        // insert penjualan
        Penjualan::create([
            'tgl_penjualan' => now(),
            'total_harga' => 0,
            'jumlah_bayar' => 0,
            'pelanggan_id' => $pelangganId
        ]);

        return redirect('/penjualan')->with('berhasil', 'Berhasil membuat data transaksi');
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
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
