<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>
    <a href="{{ route('item.index') }}">Kembali ke Daftar Item</a>

    <form action="{{ route('item.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $item->nama) }}">
        @error('nama')
            <div>{{ $message }}</div>
        @enderror

        <label for="kategori_id">Kategori:</label>
        <select name="kategori_id" id="kategori_id">
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ old('kategori_id', $item->kategori_id) == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama }}
                </option>
            @endforeach
        </select>
        @error('kategori_id')
            <div>{{ $message }}</div>
        @enderror

        <label for="harga">Harga:</label>
        <input type="text" name="harga" id="harga" value="{{ old('harga', $item->harga) }}">
        @error('harga')
            <div>{{ $message }}</div>
        @enderror

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" id="deskripsi">{{ old('deskripsi', $item->deskripsi) }}</textarea>
        @error('deskripsi')
            <div>{{ $message }}</div>
        @enderror

        <button type="submit">Update</button>
    </form>

    <!-- Tombol Hapus, jika diperlukan di luar form -->
    <p>
        <a href="{{ route('item.delete', $item->id) }}">Hapus</a>
    </p>
</body>
</html>
