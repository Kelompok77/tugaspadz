{{-- resources/views/produk/index.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>

    <table border="1" cellpadding="8">
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Status</th>
        </tr>

        @foreach ($daftarProduk as $produk)
            <tr>
                <td>{{ $produk['nama'] }}</td>
                <td>{{ $produk['kategori'] }}</td>
                <td>Rp{{ number_format($produk['harga'], 0, ',', '.') }}</td>
                <td>{{ $produk['stok'] }}</td>
                <td>
                    @if ($produk['stok'] > 0)
                        Tersedia
                    @else
                        Habis
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

</body>
</html>
