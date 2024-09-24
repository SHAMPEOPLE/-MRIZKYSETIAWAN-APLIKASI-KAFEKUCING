<!DOCTYPE html>
<html>
<head>
    <title>Daftar Item</title>
</head>
<body>
    <h1>Daftar Item</h1>
    <a href="{{ route('item.create') }}">Tambah Item</a>

    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
        @foreach ($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->kategori->nama }}</td>
                <td>{{ $item->harga }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>
                    <a href="{{ route('item.edit', $item->id) }}">Edit</a>
                    <form action="{{ route('item.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>
