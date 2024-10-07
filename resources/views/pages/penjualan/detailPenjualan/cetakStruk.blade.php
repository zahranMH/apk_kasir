<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Cetak Struk</title>
</head>
<body onload="print()">
    <h1 class="text-center mt-5">MitedShoes</h1>
    <p class="text-center mb-5">Jl. Soekarno Hatta No.23 Bandung</p>

    <div class="container">
        <div class="d-flex justify-content-between">
            <p>Kasir : <b>{{ Auth()->user()->name }}</b></p>
            <p>Pelanggan : <b>{{ $penjualan->pelanggan->nama_pelanggan }}</b></p>
        </div>
    </div>

    <p class="text-center">======================================================</p>

    <div class="container">
        <table>
            @foreach ($detailPenjualans as $detailPenjualan)

            <tr>
                <td><p>{{ $detailPenjualan->produk->nama_produk }}</p></td>
                <td><p style="margin-left: 20px;">{{ number_format($detailPenjualan->produk->harga) }}</p></td>
                <td><p style="margin-left: 170px;">{{ $detailPenjualan->jumlah_produk }}</p></td>
                <td><p style="margin-left: 12px;">Rp. </p></td>
                <td><p style="margin-left: 5px;">{{ number_format($detailPenjualan->subtotal) }}</p></td>
            </tr>
            @endforeach
        </table>
    </div>

    <p class="text-center">======================================================</p>

    <div class="container">
        <div class="d-flex justify-content-between">
            <p>Total Harga</p>

            <div class="d-flex gap-2">
                <p>Rp. </p>
                <p>{{ number_format($penjualan->total_harga) }}</p>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <p>Jumlah Bayar</p>

            <div class="d-flex gap-2">
                <p>Rp. </p>
                <p>{{ number_format($penjualan->jumlah_bayar) }}</p>
            </div>
        </div>
    </div>

    <p class="text-center">======================================================</p>

    <div class="container">
        <div class="d-flex justify-content-between">
            <p>Kembalian</p>

            <div class="d-flex gap-2">
                <p>Rp. </p>
                <p>{{ number_format($penjualan->jumlah_bayar - $penjualan->total_harga) }}</p>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 200px;">
        <h4 class="text-center">Terima Kasih</h4>
        <h4 class="text-center">Telah Berbelanja Di Kami!</h4>
    </div>
</body>
</html>
