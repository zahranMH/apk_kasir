<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function penjualan()
    {
        return $this->belongsTo(penjualan::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
