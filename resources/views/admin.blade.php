<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management Menu - Ulya's Coffee</title>
    <link rel="stylesheet" href="{{ asset('css/style_admin.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container-admin">
        <div class="header-admin">
            <h1>Dashboard Management Menu</h1>
            <div class="action-buttons">
                <a href="/admin/tambah" class="btn-add">+ Tambah Menu</a>
                <a href="/" class="btn-view-site">Lihat Web Utama</a>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th class="col-img">Gambar</th>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th class="col-action">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $m)
                <tr>
                    <td>
                        <div class="img-container">
                            <img src="{{ asset('images/' . $m->gambar) }}" class="img-preview" alt="{{ $m->nama_menu }}">
                        </div>
                    </td>
                    <td class="menu-name">{{ $m->nama_menu }}</td>
                    <td><span class="badge-category">{{ $m->kategori_relasi ? $m->kategori_relasi->nama_kategori : 'Tanpa Kategori' }}</span></td>
                    <td class="menu-price">Rp {{ number_format($m->harga, 0, ',', '.') }}</td>
                    <td>
                        <div class="action-cell">
                            <a href="/admin/edit/{{ $m->id }}" class="btn-edit">Edit</a>
                            <a href="/admin/hapus/{{ $m->id }}" class="btn-delete" onclick="return confirm('Yakin ingin menghapus menu ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>