<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class Menu extends Model
{
    // 1. Kasih tahu Laravel nama tabelnya
    protected $table = 'menu';

    // 2. Tentukan kolom mana saja yang boleh diisi
    protected $fillable = ['nama_menu', 'kategori', 'harga', 'gambar'];

    // 3. Matikan fitur created_at dan updated_at (karena di tabel kita tidak ada kolom itu)
    public $timestamps = false;


    // Relasi (one to many) satu kategori punya banyak menu
    public function kategori_relasi(){
        //menghubungkan kolom kategori di tabel menu ke kolom id di tabel kategori
        return $this->belongsTo(Kategori::class, 'kategori', 'id');
    }
}