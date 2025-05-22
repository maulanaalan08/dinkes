
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hubungi Kami - Dinas Pemerintah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
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
                  <a href="{{ route('berita') }}" class="nav-link">Berita</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('kontak') }}" class="nav-link active"> Hubungi Kami </a>
                </li>
              </ul>
            </nav>
            <button id="login-button" class="btn btn-primary">Login</button>
            <button id="mobile-menu-toggle" class="mobile-menu-toggle" aria-label="Toggle menu mobile" aria-expanded="false">
              <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" >
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
              <button type="button" id="cancel-login" class="btn btn-secondary"> Batal</button>
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
                <span class="breadcrumb-current">Hubungi Kami</span>
              </li>
            </ul>
          </nav>
        </div>

        <div class="container section-container">
          <h2 class="section-title">Hubungi Kami</h2>
          <div class="contact-container">
            <div class="contact-info">
              <h3 class="contact-subtitle">Informasi Kontak</h3>
              <ul class="contact-list">
                <li class="contact-item">
                  <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon fill="none" viewBox="0 0 24 24" stroke="currentColor" >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  <span>Jl. Contoh No. 123, Kota, Provinsi</span>
                </li>
                <li class="contact-item">
                  <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                  </svg>
                  <span>(021) 1234-5678</span>
                </li>
                <li class="contact-item">
                  <svg xmlns="http://www.w3.org/2000/svg" class="contact-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                  </svg>
                  <span>info@dinaspemerintah.go.id</span>
                </li>
              </ul>

              <div class="map-container">
                <h3 class="contact-subtitle">Lokasi Kami</h3>
                <div class="map-placeholder">
                  <svg xmlns="http://www.w3.org/2000/svg" class="map-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                  </svg>
                  <p>Peta akan ditampilkan di sini</p>
                </div>
              </div>
            </div>
            <div class="contact-form-container">
              <h3 class="contact-subtitle">Kirim Pesan</h3>
              <form class="contact-form">
                <div class="form-group">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" id="nama" class="form-input" required />
                </div>
                <div class="form-group">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" id="email" class="form-input" required />
                </div>
                <div class="form-group">
                  <label for="pesan" class="form-label">Pesan</label>
                  <textarea id="pesan" rows="4" class="form-textarea" required ></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
              </form>
            </div>
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
              <p class="footer-description"> Portal resmi Dinas Pemerintah yang menyediakan informasi dan layanan untuk masyarakat. </p>
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

