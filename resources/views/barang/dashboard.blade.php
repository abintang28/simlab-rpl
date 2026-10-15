<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventaris</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans p-6">

    <div class="max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Dashboard SIMLAB-RPL</h1>

        <!-- Grid Kartu Metrik -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
                <h3 class="text-gray-500 text-sm font-semibold uppercase">Total Barang</h3>
                <p class="text-3xl font-bold text-gray-800">{{ $totalBarang }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-emerald-500">
                <h3 class="text-gray-500 text-sm font-semibold uppercase">Tersedia</h3>
                <p class="text-3xl font-bold text-emerald-600">{{ $totalTersedia }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-rose-500">
                <h3 class="text-gray-500 text-sm font-semibold uppercase">Dipinjam</h3>
                <p class="text-3xl font-bold text-rose-600">{{ $totalDipinjam }}</p>
            </div>
        </div>

        <a href="{{ route('barang.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Menuju Daftar Barang &rarr;
        </a>
    </div>

</body>
</html>