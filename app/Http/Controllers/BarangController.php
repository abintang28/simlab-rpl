<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Tambahkan ini
use App\Models\Barang;
use App\Models\Kategori;

class BarangController extends Controller
{
    public function dashboard()
    {
        return 'Ini halaman dashboard';
    }

    public function index()
    {
        return 'Ini halaman index';
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
        return 'Ini halaman edit untuk ID: ' . $id;
    }

    public function update(Request $request, $id)
    {
        return 'Proses update data ID: ' . $id;
    }

    public function destroy($id)
    {
        return 'Proses hapus data ID: ' . $id;
    }
}