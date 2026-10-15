<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Inventaris</title>
</head>
<body>
    <h1>Daftar Inventaris Barang</h1>

    <!-- Menampilkan pesan sukses dari session -->
    @if(session('success'))
        <p style="color: green; font-weight: bold;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('barang.create') }}">+ Tambah Barang Baru</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Kondisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <!-- Mengulang data barang menggunakan  -->
            @forelse ($barangs as $barang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $barang->kode_barang }}</td>
                    <td>{{ $barang->nama_barang }}</td>
                    <td>{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                    <td>{{ $barang->stok }}</td>
                    <td>{{ $barang->kondisi }}</td>
                    <td>{{ $barang->status }}</td>
                    <td>
                        <a href="{{ route('barang.edit', $barang->id) }}">Edit</a>| 
                        <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <!-- Jika data kosong -->
                <tr>
                    <td colspan="8" style="text-align: center;">Belum ada data barang.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>