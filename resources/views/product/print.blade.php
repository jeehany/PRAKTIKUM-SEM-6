<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }
    </style>
</head>

<body>
    <h2>Daftar Produk</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if ($product->image)
                            <img src="{{ public_path('storage/products/' . $product->image) }}" style="width: 60px; height: 60px;" alt="gambar">
                        @else
                            Tidak ada
                        @endif
                    </td>
                    
                    <td>{{ $product->title }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($product->description, 50) }}</td>
                    <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
