<!DOCTYPE html>
<html>
<head>
    <title>Detail Item</title>
</head>
<body>
    <h1>Detail Item</h1>
    <a href="{{ route('item.index') }}">Kembali ke Daftar Item</a>

    <p><strong>ID:</strong> {{ $item->id }}</p>
    <p><strong>Nama:</strong> {{ $item->nama }}</p>
    <p><strong>Kategori:</strong> {{ $item->kategori->nama }}</p>
    <p><strong>Harga:</strong> {{ $item->harga }}</p>
    <p><strong>Deskripsi:</strong> {{ $item->deskripsi }}</p>
</body>
</html>
