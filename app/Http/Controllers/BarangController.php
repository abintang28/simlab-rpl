<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Tambahkan ini
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends Controller
{
       public function dashboard()
    {
        $totalBarang = \App\Models\Barang::count();
        $totalTersedia = \App\Models\Barang::where('status', 'Tersedia')->count();
        $totalDipinjam = \App\Models\Barang::where('status', 'Dipinjam')->count();

        return view('barang.dashboard', compact('totalBarang', 'totalTersedia', 'totalDipinjam'));
    }

    public function index()
    {
        $barangs = \App\Models\Barang::with('kategori')->get();
        return view('barang.index', compact('barangs'));
    }

        public function create()
    {
        // Mengambil semua data kategori untuk dropdown
        $kategoris = \App\Models\Kategori::all(); 
        
        // Mengarahkan ke file view 'barang.create' sambil membawa data kategori
        return view('barang.create', compact('kategoris'));
    }
        public function store(Request $request)
    {
        // 1. Validasi data sesuai aturan LKS
        $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok'        => 'required|integer|min:0',
            'kondisi'     => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status'      => 'required|in:Tersedia,Dipinjam,Maintenance',
            'spesifikasi' => 'nullable|string',
        ]);

        // 2. Simpan data ke database
        Barang::create($request->all());

        // 3. Redirect ke halaman index dengan flash alert sukses
        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = \App\Models\Barang::findOrFail($id);
        $kategoris = \App\Models\Kategori::all();
        
        return view('barang.edit', compact('barang', 'kategoris'));
    }

    public function update(Request $request, $id)
    {
        $barang = \App\Models\Barang::findOrFail($id);

        // Validasi (perhatikan: unique kode_barang mengabaikan ID barang yang sedang diedit)
        $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok'        => 'required|integer|min:0',
            'kondisi'     => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status'      => 'required|in:Tersedia,Dipinjam,Maintenance',
            'spesifikasi' => 'nullable|string',
        ]);

        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui');
    }

    public function destroy($id)
    {
        $barang = \App\Models\Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus');
    }
}