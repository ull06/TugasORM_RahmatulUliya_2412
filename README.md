# Tugas ORM Laravel - Ulya's Coffee

## Deskripsi
Projek ini merupakan pengembangan sistem informasi coffe shop berbasis laravel dengan penerapan konsep
MVC dan ORM menggunakan Eloquent Laravel.

## Fitur yang Diimplementasikan
- CRUD (Create, Read, Update, Delete)
- Relasi tabel menu dan kategori
- Eager Loading
- Method where()
- Method findOrfail()
- Migartion database
- Filter kategori menu

## Struktur File Utama yang Digunakan
- `app/Http/Controllers/MenuController.php` : mengatur logika, CRUD, dna filter kategori (Controller)
- `app/Models/Menu.php` : Representasi tabel database dan implementasi Eloquent ORD (Model)
- `routes/web.php` : Mengatur jalur URL (Routing)
- `resources/views/` : Berisi file Balde (`.blade.php`) untuk tampilan antarmuka halaman utama dan         admin (View)
- `public/css/` : File styaling untuk tampilanView
- `public/images/` : File gambar menu (data awal)

## Identitas Mahasiswa
- Nama: Rahmatul Uliya
- NPM: 2408107010012
