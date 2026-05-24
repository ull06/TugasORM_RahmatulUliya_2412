<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Menu - Ulya's Coffee</title>
    <link rel="stylesheet" href="{{ asset('css/style_form.css') }}">
</head>
<body>
    <div class="form-box">
        <h2>Edit Data Menu</h2>
        <form action="/admin/update/{{ $menu->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <label>Nama Menu</label>
            <input type="text" name="nama_menu" value="{{ $menu->nama_menu }}" required>

            <label>Kategori</label>
            <!-- Menampilkan dropdown dinamis berbasis ID Angka Kategori -->
            <select name="kategori" required>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ $menu->kategori == $kat->id ? 'selected' : '' }}>
                        {{ $kat->nama_kategori }}
                    </option>
                @endforeach
            </select>

            <label>Harga (Rp)</label>
            <input type="number" name="harga" value="{{ $menu->harga }}" required>

            <label>Ganti Gambar (Biarkan kosong jika tidak ingin ganti)</label>
            <input type="file" name="gambar" accept="image/*">
            <small style="display:block; margin-bottom:15px; color:#777;">File lama: {{ $menu->gambar }}</small>

            <button type="submit">UPDATE MENU</button>
            <!-- <a href="/admin" class="btn-back">Batal</a> -->
        </form>
        
        <div style="margin-top: 15px; text-align: center;">
            <a href="{{ url('/admin') }}" class="btn-back" style="text-decoration: none;">Batal</a>
        </div>
    </div>
</body>
</html>