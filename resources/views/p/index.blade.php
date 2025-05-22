<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal Dinas Pemerintah</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <div id="app" class="site-container">
    <header class="site-header">
      <div class="container header-container">
        <div class="logo-container">
          <img src="assets/Logo Dinas.png" alt="Logo Dinas Pemerintah" class="logo-image" />
          <div class="logo-text">
            <h1 class="site-title">Dinas Pemerintah</h1>
            <p class="site-tagline">Melayani Dengan Sepenuh Hati</p>
          </div>
        </div>
        <div class="header-actions">
          <nav class="main-navigation">
            <ul class="nav-list">
              <li class="nav-item">
                <a href="{{ route('index') }}" class="nav-link active">Beranda</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('profile') }}" class="nav-link">Profil</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('upt') }}" class="nav-link">UPT Dinas</a>
              </li>
              <li class="nav-item">
                <a href="{{ route('berita') }}" class="nav-link">Berita</a>
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
          <button id="mobile-menu-toggle" class="mobile-menu-toggle" aria-label="Toggle menu mobile" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
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

    <!-- Login Modal -->
    <div id="login-modal" class="modal">
      <div class="modal-content">
        <h2 class="modal-title">Login</h2>
        <form method="POST" id="login-form" action="{{ route('login') }}">
          {{ csrf_field() }}
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
      <section id="beranda-tab" class="content-tab active">
        <div class="hero-section">
          <img src="assets/dinas-kesehatan-kota-surabaya.jpg" alt="Hero Banner Dinas Pemerintah" class="hero-image"/>
          <div class="hero-overlay">
            <div class="hero-content">
              <h1 class="hero-title">Selamat Datang</h1>
              <p class="hero-subtitle">Portal Resmi Dinas Pemerintah</p>
            </div>
          </div>
        </div>

        <div class="container section-container">
          <h2 class="section-title">Layanan Kami</h2>
          @foreach ($layanan as $l) 
            <div class="services-grid">
              <article class="service-card">
                <img src="{{ asset('uploads/' . $l->gambar)}}" alt="{{ $l->gambar }}" class="service-image" style="width:400px; height:300px"/>
                <h3 class="service-title">{{ $l->judul }}</h3>
                <p class="service-description">{{ $l->detail }}</p>
              </article>
            </div>
          @endforeach
        </div>
      </section>
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