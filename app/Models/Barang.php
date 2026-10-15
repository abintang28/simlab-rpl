<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
        public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    protected $fillable = [
    'kategori_id', 'kode_barang', 'nama_barang', 
    'spesifikasi', 'stok', 'kondisi', 'status'
];



    //
}
