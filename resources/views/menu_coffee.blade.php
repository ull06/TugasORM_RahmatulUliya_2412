<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulya's Coffee</title>
    <link rel="stylesheet" href="{{ asset('css/style_menu.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>

    <nav class="navbar">
        <div class="logo">Ulya's Coffee</div>
        <ul>
            <!-- Tombol Beranda / Reset Filter -->
            <li><a href="/">Home</a></li>
            
            <!-- Looping otomatis Kategori dari Database langsung jadi Menu Navigasi -->
            @foreach($kategori as $kat)
                <li><a href="/?filter={{ $kat->id }}">{{ $kat->nama_kategori }}</a></li>
            @endforeach
            
            <li><a href="/admin">Edit Menu</a></li>
        </ul>
    </nav>

    <header id="home" class="hero">
        <div class="hero-content">
            <h4>Welcome to</h4>
            <h1>Ulya's Coffee</h1>
            <p>Menyajikan rasa yang tertinggal dalam setiap seduhan.</p>
            <a href="#menu-display" class="btn">Lihat Menu</a>
        </div>
    </header>

    <!-- Judul Tampilan Menu yang Dinamis -->
    <div id="menu-display" class="container title-container">
        <h2 class="category-title">
            <span>Our Fresh Menu</span>
            {{ $kategoriAktif }}
        </h2>
    </div>

    <!-- SECTION 1: KHUSUS MINUMAN -->
    @if(!request()->has('filter') || (request()->has('filter') && $data->whereIn('kategori_relasi.nama_kategori', ['Iced Coffee', 'Milky Series'])->count() > 0))
    <section id="minuman" class="menu-section">
        <div class="container">
            <h2 class="category-title"><span>Our Signature</span>Minuman</h2>
            <div class="menu-grid">
                @foreach($data as $m)
                    @if($m->kategori_relasi && in_array($m->kategori_relasi->nama_kategori, ['Iced Coffee', 'Milky Series']))
                    <div class="menu-card">
                        <div class="menu-img">
                            <img src="{{ asset('images/' . $m->gambar) }}" alt="{{ $m->nama_menu }}">
                        </div>
                        <div class="menu-details">
                            <h3>{{ $m->nama_menu }}</h3>
                            <p class="category-tag">{{ $m->kategori_relasi->nama_kategori }}</p>
                            <span class="price">Rp {{ number_format($m->harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- SECTION 2: KHUSUS MAKANAN -->
    @if(!request()->has('filter') || (request()->has('filter') && $data->whereIn('kategori_relasi.nama_kategori', ['Snacks', 'Food'])->count() > 0))
    <section id="makanan" class="menu-section">
        <div class="container">
            <h2 class="category-title"><span>Delicious</span>Makanan</h2>
            <div class="menu-grid">
                @foreach($data as $m)
                    @if($m->kategori_relasi && in_array($m->kategori_relasi->nama_kategori, ['Snacks', 'Food']))
                    <div class="menu-card">
                        <div class="menu-img">
                            <img src="{{ asset('images/' . $m->gambar) }}" alt="{{ $m->nama_menu }}">
                        </div>
                        <div class="menu-details">
                            <h3>{{ $m->nama_menu }}</h3>
                            <p class="category-tag">{{ $m->kategori_relasi->nama_kategori }}</p>
                            <span class="price">Rp {{ number_format($m->harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Jika data filter kosong -->
    @if($data->count() == 0)
        <div class="empty-data">
            <p>Ups, belum ada menu untuk kategori ini!</p>
        </div>
    @endif

</body>
</html>