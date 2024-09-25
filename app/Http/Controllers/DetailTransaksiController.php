<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\Produk;

class DetailTransaksiController
{
    public function index(String $id)
    {
        return view('pages.penjualan.detailPenjualan.index', [
            'produks' => Produk::all(),
            'detail_penjualans' => DetailPenjualan::where('penjualan_id', $id)->orderBy('created_at', 'desc')->get(),
            'total_semua' => DetailPenjualan::where('penjualan_id', $id)->sum('subtotal'),
            'data_penjualan' => Penjualan::find($id)
        ]);
    }

    public function create(String $id, String $id_penjualan)
    {
        return view('pages.penjualan.detailPenjualan.create', [
            'produks' => Produk::all(),
            'produk_satu' => Produk::find($id),
            'total_semua' => DetailPenjualan::where('penjualan_id', $id)->sum('subtotal'),
            'detail_penjualans' => DetailPenjualan::where('penjualan_id', $id_penjualan)->orderBy('created_at', 'desc')->get(),
            'data_penjualan' => Penjualan::find($id_penjualan)
        ]);
    }

    public function store(Request $request)
    {
        // insert detail transaksi
        DetailPenjualan::create([
            'jumlah_produk' => $request->qty,
            'subtotal' => $request->subtotal_no_format,
            'penjualan_id' => $request->id_penjualan,
            'produk_id' => $request->id_produk
        ]);

        // update stok produk
        $qty = $request->qty;
        $stok = $request->stok;
        $kuranginStok = $stok - $qty;

        Produk::where('id', $request->id_produk)->update([
            'stok' => $kuranginStok
        ]);

        $id_penjualan = $request->id_penjualan;

        // simpan id penjualan dan produk ke session
        session([
            'produks' => Produk::all(),
            'data_penjualan' => Penjualan::find($id_penjualan),
            'detail_penjualans' => DetailPenjualan::where('penjualan_id', $id_penjualan)->orderBy('created_at', 'desc')->get(),
            'total_semua' => DetailPenjualan::where('penjualan_id', $id_penjualan)->sum('subtotal')
        ]);

        return redirect('/DetailTransaksi/' . $id_penjualan);
    }

    // hapus menggunakan checkbox
    public function destroy(Request $request)
    {
        $detail_penjualanID = $request->input('id_detail_penjualan');

        if($detail_penjualanID) {

            // ambil id penjualan
            $detail_penjualans = DetailPenjualan::whereIn('id', $detail_penjualanID)->get();
            $id_penjualan = $detail_penjualans->first()->penjualan_id;

            // update stok produk
            foreach($detail_penjualans as $detail_penjualan) {
                $id_produk = $detail_penjualan->produk_id;
                $jumlah_Qty = $detail_penjualan->jumlah_produk;

                // ambil produk berdasarkan id
                $produk = Produk::find($id_produk);
                if($produk) {
                    $produk->stok += $jumlah_Qty;
                    $produk->save();
                }
            }

            DetailPenjualan::destroy($detail_penjualanID);

            // simpan id penjualan dan produk ke session
            session([
                'produks' => Produk::all(),
                'data_penjualan' => Penjualan::find($id_penjualan),
                'detail_penjualans' => DetailPenjualan::where('penjualan_id', $id_penjualan)->orderBy('created_at', 'desc')->get(),
                'total_semua' => DetailPenjualan::where('penjualan_id', $id_penjualan)->sum('subtotal')
            ]);

            return redirect('/DetailTransaksi/' . $id_penjualan)->with('berhasil', 'Berhasil menghapus data di keranjang');
        }

    }

    public function cetakStruk(String $id)
    {
        return view('pages.penjualan.detailPenjualan.cetakStruk', [
            'penjualan' => Penjualan::find($id),
            'detailPenjualans' => DetailPenjualan::where('penjualan_id', $id)->orderBy('created_at', 'DESC')->get()
        ]);
    }

}
