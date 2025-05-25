<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita - Dinas Pemerintah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div id="app" class="site-container">
        <header class="site-header">
            <div class="container header-container">
                <div class="logo-container">
                    <img src="{{ asset('assets/Logo Dinas.png') }}" alt="Logo Dinas Pemerintah" class="logo-image" />
                    <div class="logo-text">
                        <h1 class="site-title">Dinas Pemerintah</h1>
                        <p class="site-tagline">Melayani Dengan Sepenuh Hati</p>
                    </div>
                </div>
                <div class="header-actions">
                    <nav class="main-navigation">
                        <ul class="nav-list">
                            <li class="nav-item">
                                <a href="{{ route('index') }}" class="nav-link ">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('profile') }}" class="nav-link">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('upt') }}" class="nav-link">UPT Dinas</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('berita') }}" class="nav-link active">Berita</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('kontak') }}" class="nav-link"> Hubungi Kami </a>
                            </li>
                        </ul>
                    </nav>
                    @if (Route::has('login'))
                    <div class="top-right links">
                        @if (Auth::check())
                        @else
                        <a href="{{ route('show') }}" class="btn btn-primary">Login</a>
                        @endif
                    </div>
                    @endif
                </div>
            </div>
        </header>

        <main class="main-content mt-4">
            <div class="container">
                <nav class="breadcrumb">
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item">
                            <a href="{{ route('index') }}" class="breadcrumb-link">Beranda</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('berita') }}" class="breadcrumb-link">Berita</a>
                        </li>
                        <li class="breadcrumb-item">
                            <span class="breadcrumb-current">Berita Detail</span>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="container section-container">
                <div class="col-md-8 offset-md-2">
                    <h2 class="news-title">{{ $berita->judul }}</h2>
                    <img src="{{ asset('berita/' . $berita->gambar) }}" alt="{{ $berita->judul }}" class="img-fluid mb-3" style="width:100%; max-height:500px; object-fit:cover;">
                    <p class="text-muted mt-2" style="font-size: 0.875rem;">
                        Di Upload {{ $berita->updated_at->format('d M Y') }}
                    </p>
                    <p class="news-detail-text">{{ $berita->detail }}</p>

                    <a href="{{ route('berita') }}" class="btn btn-secondary mt-3">← Kembali ke Berita</a>
                </div>
            </div>

        </main>


        <footer class="site-footer">
            <div class="container footer-container">
                <div class="footer-grid">
                    <div class="footer-about">
                        <div class="footer-logo">
                            <img src="{{ asset('assets/Logo Dinas.png') }}" alt="Logo Footer" class="footer-logo-image" />
                            <div class="footer-logo-text">
                                <h3 class="footer-title">Dinas Pemerintah</h3>
                                <p class="footer-tagline">Melayani Dengan Sepenuh Hati</p>
                            </div>
                        </div>
                        <p class="footer-description">Portal resmi Dinas Pemerintah yang menyediakan informasi dan layanan untuk masyarakat.
                        </p>
                    </div>
                    <div class="footer-links">
                        <h3 class="footer-title">Tautan Cepat</h3>
                        <ul class="footer-nav">
                            <li class="footer-nav-item">
                                <a href="{{ route('index') }}" class="footer-nav-link ">Beranda</a>
                            </li>
                            <li class="footer-nav-item">
                                <a href="{{ route('profile') }}" class="footer-nav-link">Profil</a>
                            </li>
                            <li class="footer-nav-item">
                                <a href="{{ route('upt') }}" class="footer-nav-link">UPT Dinas</a>
                            </li>
                            <li class="footer-nav-item">
                                <a href="{{ route('berita') }}" class="footer-nav-link">Berita</a>
                            </li>
                            <li class="footer-nav-item">
                                <a href="{{ route('kontak') }}" class="footer-nav-link"> Hubungi Kami </a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-hours">
                        <h3 class="footer-title">Jam Operasional</h3>
                        <ul class="hours-list">
                            <li class="hours-item">Senin - Jumat: 08.00 - 16.00</li>
                            <li class="hours-item">Sabtu: 08.00 - 12.00</li>
                            <li class="hours-item">Minggu & Hari Libur: Tutup</li>
                        </ul>
                    </div>
                </div>
                <div class="footer-copyright">
                    <p>&copy; 2024 Dinas Pemerintah. Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </footer>
    </div>
    {{-- JS --}}
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>

</html>