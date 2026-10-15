<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
</head>
<body>
    <h1>Edit Barang: {{ $barang->nama_barang }}</h1>

    <form action="{{ route('barang.update', $barang->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Wajib untuk proses update -->

        <label>Kategori:</label><br>
        <select name="kategori_id">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ old('kategori_id', $barang->kategori_id) == $kategori->id ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
            @endforeach
        </select>
        @error('kategori_id') <span style="color:red">{{ $message }}</span> @enderror
        <br><br>

        <label>Kode Barang:</label><br>
        <input type="text" name="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}">
        @error('kode_barang') <span style="color:red">{{ $message }}</span> @enderror
        <br><br>

        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}">
        @error('nama_barang') <span style="color:red">{{ $message }}</span> @enderror
        <br><br>

        <label>Spesifikasi:</label><br>
        <textarea name="spesifikasi">{{ old('spesifikasi', $barang->spesifikasi) }}</textarea>
        @error('spesifikasi') <span style="color:red">{{ $message }}</span> @enderror
        <br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}">
        @error('stok') <span style="color:red">{{ $message }}</span> @enderror
        <br><br>

        <label>Kondisi:</label><br>
        <select name="kondisi">
            <option value="">-- Pilih Kondisi --</option>
            <option value="Baik" {{ old('kondisi', $barang->kondisi) == 'Baik' ? 'selected' : '' }}>Baik</option>
            <option value="Rusak Ringan" {{ old('kondisi', $barang->kondisi) == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
            <option value="Rusak Berat" {{ old('kondisi', $barang->kondisi) == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
        </select>
        @error('kondisi') <span style="color:red">{{ $message }}</span> @enderror
        <br><br>

        <label>Status:</label><br>
        <select name="status">
            <option value="">-- Pilih Status --</option>
            <option value="Tersedia" {{ old('status', $barang->status) == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
            <option value="Dipinjam" {{ old('status', $barang->status) == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
            <option value="Maintenance" {{ old('status', $barang->status) == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
        </select>
        @error('status') <span style="color:red">{{ $message }}</span> @enderror
        <br><br>

        <button type="submit">Update Barang</button>
        <a href="{{ route('barang.index') }}">Batal</a>
    </form>
</body>
</html>