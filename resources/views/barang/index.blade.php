<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Inventaris</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans p-6">

    <div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Daftar Inventaris Barang</h1>

        <!-- Flash Alert Sukses -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('barang.create') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">
            + Tambah Barang Baru
        </a>

        <!-- Wrapper agar tabel bisa di-scroll horizontal di HP -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr class="bg-gray-200 text-gray-700 uppercase text-sm leading-normal">
                        <th class="py-3 px-4 text-left">No</th>
                        <th class="py-3 px-4 text-left">Kode</th>
                        <th class="py-3 px-4 text-left">Nama Barang</th>
                        <th class="py-3 px-4 text-left">Kategori</th>
                        <th class="py-3 px-4 text-left">Stok</th>
                        <th class="py-3 px-4 text-left">Kondisi</th>
                        <th class="py-3 px-4 text-left">Status</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm font-light">
                    @forelse ($barangs as $barang)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $barang->kode_barang }}</td>
                            <td class="py-3 px-4">{{ $barang->nama_barang }}</td>
                            <td class="py-3 px-4">{{ $barang->kategori->nama_kategori ?? '-' }}</td>
                            <td class="py-3 px-4">{{ $barang->stok }}</td>
                            <td class="py-3 px-4">{{ $barang->kondisi }}</td>
                            <td class="py-3 px-4">
                                <!-- Status Badge dengan warna dinamis -->
                                @if($barang->status == 'Tersedia')
                                    <span class="bg-emerald-100 text-emerald-800 py-1 px-3 rounded-full text-xs font-semibold">Tersedia</span>
                                @elseif($barang->status == 'Dipinjam')
                                    <span class="bg-rose-100 text-rose-800 py-1 px-3 rounded-full text-xs font-semibold">Dipinjam</span>
                                @else
                                    <span class="bg-amber-100 text-amber-800 py-1 px-3 rounded-full text-xs font-semibold">Maintenance</span>
                                @endif
                            </td>
                            <td class="py-3 px-4 text-center">
                                <div class="flex item-center justify-center gap-2">
                                    <a href="{{ route('barang.edit', $barang->id) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded text-xs">Edit</a>
                                    
                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded text-xs">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="py-6 text-center text-gray-500">Belum ada data barang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>