<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];
    public $timestamps = false;

    // Relasi One-to-Many: Satu kategori punya banyak menu
    public function menus()
    {
        return $this->hasMany(Menu::class, 'kategori', 'id');
    }
}