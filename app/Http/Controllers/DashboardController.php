<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // user login
        $user_login = Auth()->user()->id;
        $user = User::find($user_login);

        if($user->level == 'admin') {
            return view('pages.dashboard', [
                'user_total' => User::count(),
                'produk_total' => Produk::count(),
                'pelanggan_total' => Pelanggan::count(),
                'total_harga_penjualan' => Penjualan::sum('total_harga'),
                'penjualan_admin' => Penjualan::where('total_harga', '>', 0)->orderBy('created_at', 'DESC')->take(6)->get(),
            ]);
        } else {
            return view('pages.dashboard', [
                'penjualan_total' => Penjualan::where('user_id', $user_login)->count(),
                'produk_total' => Produk::count(),
                'total_harga_penjualan' => Penjualan::where('user_id', $user_login)->sum('total_harga'),
                'penjualan_petugas' => Penjualan::where('total_harga', '>', 0)->where('user_id', $user_login)->orderBy('created_at', 'DESC')->take(6)->get(),
            ]);
        }

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
        //
    }
}
