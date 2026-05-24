<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Menu - Ulya's Coffee</title>
    <link rel="stylesheet" href="{{ asset('css/style_form.css') }}">
</head>
<body>
    <div class="form-box">
        <h2>Tambah Menu Baru</h2>
        <form action="/admin/simpan" method="POST" enctype="multipart/form-data">
            @csrf 
            
            <label>Nama Menu</label>
            <input type="text" name="nama_menu" placeholder="Contoh: Espresso" required>

            <label>Kategori</label>
            <!-- Dropdown otomatis mengambil data id dan nama dari database -->
            <select name="kategori" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}">{{ $kat->nama_kategori }}</option>
                @endforeach
            </select>

            <label>Harga (Rp)</label>
            <input type="number" name="harga" placeholder="Contoh: 25000" required>

            <label>Upload Gambar Menu</label>
            <input type="file" name="gambar" accept="image/*" required>

            <button type="submit">SIMPAN MENU</button>
            <a href="/admin" class="btn-back">Batal & Kembali</a>
        </form>
    </div>
</body>
</html>