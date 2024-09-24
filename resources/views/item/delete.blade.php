<!DOCTYPE html>
<html>
<head>
    <title>Hapus Item</title>
</head>
<body>
    <h1>Hapus Item</h1>
    <a href="{{ route('item.index') }}">Kembali ke Daftar Item</a>

    <form action="{{ route('item.destroy', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <p>Apakah Anda yakin ingin menghapus item ini?</p>

        <p><strong>ID:</strong> {{ $item->id }}</p>
        <p><strong>Nama:</strong> {{ $item->nama }}</p>
        <p><strong>Kategori:</strong> {{ $item->kategori->nama ?? 'Tidak ada' }}</p>
        <p><strong>Harga:</strong> {{ $item->harga }}</p>
        <p><strong>Deskripsi:</strong> {{ $item->deskripsi }}</p>

        <button type="submit">Hapus</button>
        <a href="{{ route('item.index') }}">Batal</a>
    </form>
</body>
</html>
