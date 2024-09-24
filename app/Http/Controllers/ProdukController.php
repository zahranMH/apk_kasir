<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.produk.daftarProduk', [
            'produks' => Produk::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.produk.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_produk' => 'required|min:3|max:255',
            'harga' => 'required',
            'stok' => 'required',
            'img_produk' => 'required|image|file'
        ]);

        $validatedData['img_produk'] = $request->file('img_produk')->store('img_produks', 'public');

        Produk::create($validatedData);

        return redirect('/ProdukAdmin')->with('berhasil', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('pages.produk.admin.show', [
            'produks' => Produk::all(),
            'produk_satu' => Produk::find($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('pages.produk.admin.edit', [
            'produk' => Produk::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_produk' => 'required|min:3|max:255',
            'harga' => 'required',
            'stok' => 'required'
        ];

        if($request->hasFile('img_produk')) {
            $rules['img_produk'] = 'image|file';
        }

        $validatedData = $request->validate($rules);

        $disk = Storage::disk('public');

        // cek jika ada img baru
        if($request->hasFile('img_produk')){

            // hapus img lama
            if($request->img_produk_lama) {
                $disk->delete($request->img_produk_lama);
            }

            // insert img produk baru
            $validatedData['img_produk'] = $request->file('img_produk')->store('img_produks', 'public');
        }

        Produk::where('id', $id)->update($validatedData);

        return redirect('ProdukAdmin')->with('berhasil', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::find($id);

        $img_produk = $produk->img_produk;

        $disk = Storage::disk('public');

        $disk->delete($img_produk);

        $produk->delete();

        return redirect('/ProdukAdmin')->with('berhasil', 'Data Berhasil Dihapus');
    }

    public function tableAdmin()
    {
        return view('pages.produk.admin.table_admin', [
            'produks' => Produk::all()
        ]);
    }

    public function showPetugas(String $id)
    {
        return view('pages.produk.show', [
            'produks' => Produk::all(),
            'produk' => Produk::find($id)
        ]);
    }

}
