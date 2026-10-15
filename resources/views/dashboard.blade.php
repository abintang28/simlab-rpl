<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inventaris</title>
</head>
<body>
    <h1>Dashboard SIMLAB-RPL</h1>
    
    <p>Ringkasan data inventaris saat ini:</p>

    <ul>
        <li><strong>Total Barang:</strong> {{ $totalBarang }}</li>
        <li><strong>Total Tersedia:</strong> {{ $totalTersedia }}</li>
        <li><strong>Total Dipinjam:</strong> {{ $totalDipinjam }}</li>
    </ul>

    <br>
    <a href="{{ route('barang.index') }}">Menuju Daftar Barang &rarr;</a>
</body>
</html>