<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal - Dinas Pemerintah</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css" />
</head>

<body>
  <div id="app" class="site-container">
    <header class="site-header bg-gradient-secondary">
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
          
          <button id="mobile-menu-toggle" class="mobile-menu-toggle" aria-label="Toggle menu mobile" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </div>
      <div id="mobile-menu" class="container mobile-menu">
        <ul class="mobile-nav-list">
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
          {{-- <div class="form-actions">
            <button type="button" id="cancel-login" class="btn btn-secondary">Batal</button>
            <button type="submit" class="btn btn-primary">Login</button>
          </div> --}}
        </form>
      </div>
    </div>

    <main class="main-content">
  <section id="beranda-tab" class="content-tab active">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        @foreach ($beranda as $index => $b)
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}" class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide {{ $index + 1 }}" style="background-color: rgba(255, 255, 255, 0.7); border: 1px solid rgba(0, 0, 0, 0.2);"></button>
        @endforeach
      </div>
      <div class="carousel-inner">
        @foreach ($beranda as $b)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('beranda/' . $b->gambar) }}" class="d-block w-100" style="width: 100%; height: 600px; object-fit: fit;" alt="{{ $b->judul }}">
            {{-- Bagian caption dengan CSS inline --}}
            <div class="carousel-caption d-md-block text-white"
                 style="
                   background-color: rgba(0, 0, 0, 0.6);
                   padding: 20px 40px;
                   left: 0;
                   right: 0;
                   bottom: 40px; /* Sesuaikan ini untuk posisi di atas indikator */
                   z-index: 10;
                   text-align: center;
                   backdrop-filter: blur(1px);
                   -webkit-backdrop-filter: blur(1px);
                 ">
              <h3 class="display-5 fw-bold" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">{{ $b->judul }}</h3>
              <p class="lead" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);">{{ $b->detail }}</p>
            </div>
          </div>
        @endforeach
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="container section-container">
      <h2 class="section-title text-center mb-4">Layanan Kami</h2>
      <div class="row">
        @foreach ($layanan as $l)
        <div class="col-md-4 mb-4">
          <div class="card h-100 text-center">
            <img src="{{ asset('uploads/' . $l->gambar)}}" alt="{{ $l->gambar }}" class="service-image" style="width:400px; height:300px" />
            <h3 class="service-title">{{ $l->judul }}</h3>
            <p class="service-description">{{ $l->detail }}</p>
          </div>
        </div>
        @endforeach
      </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>

</html>