<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans p-6">

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Tambah Barang Baru</h1>

        <form action="{{ route('barang.store') }}" method="POST">
            @csrf

            <!-- Kategori -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Kategori:</label>
                <select name="kategori_id" class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('kategori_id') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <!-- Kode Barang -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Kode Barang:</label>
                <input type="text" name="kode_barang" value="{{ old('kode_barang') }}" class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500">
                @error('kode_barang') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <!-- Nama Barang -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nama Barang:</label>
                <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500">
                @error('nama_barang') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <!-- Spesifikasi -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Spesifikasi:</label>
                <textarea name="spesifikasi" class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500">{{ old('spesifikasi') }}</textarea>
                @error('spesifikasi') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <!-- Stok -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Stok:</label>
                <input type="number" name="stok" value="{{ old('stok') }}" class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500">
                @error('stok') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <!-- Kondisi -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Kondisi:</label>
                <select name="kondisi" class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500">
                    <option value="">-- Pilih Kondisi --</option>
                    <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
                @error('kondisi') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Status:</label>
                <select name="status" class="w-full border border-gray-300 rounded py-2 px-3 focus:outline-none focus:border-blue-500">
                    <option value="">-- Pilih Status --</option>
                    <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
                @error('status') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
            </div>

            <div class="flex items-center gap-2 mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Simpan Barang
                </button>
                <a href="{{ route('barang.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white font-bold py-2 px-4 rounded">
                    Batal
                </a>
            </div>
        </form>
    </div>

</body>
</html>