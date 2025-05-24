
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Berita - Dinas Pemerintah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <div id="app" class="site-container">
      <header class="site-header">
        <div class="container header-container">
          <div class="logo-container">
            <img src="{{ asset('assets/Logo Dinas.png') }}" alt="Logo Dinas Pemerintah" class="logo-image"/>
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
        <div id="mobile-menu" class="mobile-menu">
          <ul class="mobile-nav-list">
            <li class="mobile-nav-item">
              <a href="index.html" class="mobile-nav-link"> Beranda </a>
            </li>
            <li class="mobile-nav-item">
              <a href="profil.html" class="mobile-nav-link">Profil</a>
            </li>
            <li class="mobile-nav-item">
              <a href="upt.html" class="mobile-nav-link">UPT Dinas</a>
            </li>
            <li class="mobile-nav-item">
              <a href="berita.html" class="mobile-nav-link">Berita</a>
            </li>
            <li class="mobile-nav-item">
              <a href="kontak.html" class="mobile-nav-link"> Hubungi Kami </a>
            </li>
          </ul>
        </div>
      </header>

      <div id="login-modal" class="modal">
        <div class="modal-content">
          <h2 class="modal-title">Login</h2>
          <form id="login-form">
            <div class="form-group">
              <label for="username" class="form-label">Username</label>
              <input type="text" id="username" class="form-input" required />
            </div>
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input type="password" id="password" class="form-input" required />
            </div>
            <div class="form-actions">
              <button type="button" id="cancel-login" class="btn btn-secondary">Batal</button>
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>

      <main class="main-content">
        <div class="container">
          <nav class="breadcrumb">
            <ul class="breadcrumb-list">
              <li class="breadcrumb-item">
                <a href="index.html" class="breadcrumb-link">Beranda</a>
              </li>
              <li class="breadcrumb-item">
                <span class="breadcrumb-current">Berita</span>
              </li>
            </ul>
          </nav>
        </div>

        <div class="container section-container">
          <h2 class="section-title">Berita & Pengumuman</h2>
          <div class="filter-container">
            <button class="filter-button active">Semua</button>
            <button class="filter-button">Pengumuman</button>
            <button class="filter-button">Kegiatan</button>
            <button class="filter-button">Artikel</button>
          </div>

          <div id="news-container" class="news-grid">
            @foreach ($berita as $b)
              <article class="news-card">
                <img src="{{ asset('berita/'. $b->gambar) }}" alt="{{ $b->gambar }}" style="width:300px; height:400px" class="news-image"/>
                <h3 class="news-title">{{ $b->judul }}</h3>
                <p class="news-date">{{ $b->detail }}</p>
                <a href="#" class="news-link">Baca selengkapnya</a>
              </article>
            @endforeach
          </div>

          <nav class="pagination">
            <ul class="pagination-list">
              <li class="pagination-item">
                <a href="#" class="pagination-prev pagination-disabled" aria-label="Previous page" >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                  </svg>
                </a>
              </li>
              <li class="pagination-item">
                <a href="#" class="pagination-link active">1</a>
              </li>
              <li class="pagination-item">
                <a href="#" class="pagination-link">2</a>
              </li>
              <li class="pagination-item">
                <a href="#" class="pagination-link">3</a>
              </li>
              <li class="pagination-item">
                <a href="#" class="pagination-next" aria-label="Next page">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </main>

      <footer class="site-footer">
        <div class="container footer-container">
          <div class="footer-grid">
            <div class="footer-about">
              <div class="footer-logo">
                <img src="assets/Logo Dinas.png" alt="Logo Footer" class="footer-logo-image" />
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
  </body>
<script src="js/script.js"></script>
</html>

