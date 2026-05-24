<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;
use App\Models\Menu;

class DaftarMenuSeeder extends Seeder
{
    public function run(): void
    {
        // 1. KATEGORI (Sangat Bagus & Benar!)
        $coffee = Kategori::create(['nama_kategori' => 'Iced Coffee']);
        $milky  = Kategori::create(['nama_kategori' => 'Milky Series']);
        $snack  = Kategori::create(['nama_kategori' => 'Snacks']);
        $food   = Kategori::create(['nama_kategori' => 'Food']);

        // 2. MENU 
        Menu::create([
            'nama_menu' => 'Americano',
            'kategori' => $coffee->id, // Menggunakan ID otomatis dari kategori coffee
            'harga' => 15000,
            'gambar' => 'americano.png'
        ]);

        Menu::create([
            'nama_menu' => 'Cafe Latte',
            'kategori' => $coffee->id,
            'harga' => 18000,
            'gambar' => 'latte.png'
        ]);

        Menu::create([
            'nama_menu' => 'Matcha Latte',
            'kategori' => $milky->id,
            'harga' => 20000,
            'gambar' => 'matcha.png'
        ]);


         Menu::create([
            'nama_menu' => 'Matcha Berry',
            'kategori' => $milky->id,
            'harga' => 22000,
            'gambar' => 'berry.png'
        ]);

        Menu::create([
            'nama_menu' => 'French Fries',
            'kategori' => $snack->id,
            'harga' => 12000,
            'gambar' => 'kentang.png'
        ]);

     
        Menu::create([
            'nama_menu' => 'Risol',
            'kategori' => $snack->id,
            'harga' => 20000,
            'gambar' => 'risol.png'
        ]);

        Menu::create([
            'nama_menu' => 'Sandwich',
            'kategori' => $snack->id,
            'harga' => 25000,
            'gambar' => 'sandwich.png'
        ]);
    }
}