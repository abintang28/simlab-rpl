<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // Tambahkan ini

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
        return 'Ini halaman form create';
    }

    public function store(Request $request)
    {
        return 'Proses simpan data';
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