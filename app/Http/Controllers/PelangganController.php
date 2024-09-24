<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PelangganController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.pelanggan.index', [
            'pelanggans' => Pelanggan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // delete pelanggan
        Pelanggan::where('id', $id)->delete();

        // delete penjualan yang bersangkutan penjualan
        Penjualan::where('pelanggan_id', $id)->delete();

        return redirect('/pelanggan')->with('berhasil', "Data Berhasil Dihapus");

    }
}
