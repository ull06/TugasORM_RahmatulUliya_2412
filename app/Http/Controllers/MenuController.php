<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    // 1. HALAMAN PELANGGAN
    public function index(Request $request)
    {
        // Menggunakan Eager Loading 'with' agar relasi kategori langsung terbawa ke View pelanggan
        $query = Menu::with('kategori_relasi');
        $kategoriAktif = 'Semua Produk'; // Judul default jika tidak ada filter

        // Memakai method where() untuk filter kategori jika parameter filter ada di URL
        if ($request->has('filter')) {
            $query->where('kategori', $request->filter);
            
            // Ambil data kategori berdasarkan ID filter untuk keperluan judul di View
            $kat = Kategori::find($request->filter);
            if ($kat) {
                $kategoriAktif = 'Kategori: ' . $kat->nama_kategori;
            }
        }

        $data = $query->get();
        $kategori = Kategori::all();

        // Mengirimkan variabel data, kategori, dan kategoriAktif ke View
        return view('menu_coffee', compact('data', 'kategori', 'kategoriAktif'));
    }

    // 2. Menampilkan halaman tabel untuk ADMIN
    public function admin()
    {
        // Memakai Eager Loading 'with' untuk membaca relasi antar tabel
        $data = Menu::with('kategori_relasi')->get();
        return view('admin', compact('data'));
    }

    // 3. Menampilkan FORM TAMBAH menu
    public function create()
    {
        $kategori = Kategori::all();
        return view('form_tambah', compact('kategori'));
    }

    // 4. PROSES SIMPAN data dari form ke Database
    public function store(Request $request)
    {
        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $file->move('images', $nama_file);

        // Menyimpan ID Kategori (Angka) ke database secara otomatis
        Menu::create([
            'nama_menu' => $request->nama_menu,
            'kategori'  => $request->kategori,
            'harga'     => $request->harga,
            'gambar'    => $nama_file,
        ]);

        return redirect('/admin')->with('success', 'Menu berhasil ditambah!');
    }

    // 5. PROSES HAPUS data
    public function delete($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect('/admin')->with('success', 'Menu berhasil dihapus!');
    }

    // 6. Menampilkan halaman FORM EDIT (Mengambil data lama)
    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $kategori = Kategori::all();

        return view('edit_menu', compact('menu', 'kategori'));
    }

    // 7. PROSES UPDATE data yang sudah diedit ke Database
    public function update(Request $request, $id)
    {
        $menu = Menu::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $file->move('images', $nama_file);
            $menu->gambar = $nama_file;
        }

        $menu->update([
            'nama_menu' => $request->nama_menu,
            'kategori'  => $request->kategori,
            'harga'     => $request->harga,
        ]);

        return redirect('/admin')->with('success', 'Menu berhasil diperbarui!');
    }
}