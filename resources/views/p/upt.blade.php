<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>UPT Dinas - Dinas Pemerintah</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="cdn.datatables.net/2.3.1/css/dataTables.dataTables.min.css">
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
                  <a href="{{ route('profile') }}" class="nav-link ">Profil</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('upt') }}" class="nav-link active ">UPT Dinas</a>
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
          <form id="login-form">
            <div class="form-group">
              <label for="username" class="form-label">Username</label>
              <input type="text" id="username" class="form-input" required />
            </div>
            <div class="form-group">
              <label for="password" class="form-label">Password</label>
              <input
                type="password"
                id="password"
                class="form-input"
                required
              />
            </div>
            <div class="form-actions">
              <button type="button" id="cancel-login" class="btn btn-secondary">
                Batal
              </button>
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Main Content -->
      <main class="main-content">
        <!-- Breadcrumb -->
        <div class="container">
          <nav class="breadcrumb">
            <ul class="breadcrumb-list">
              <li class="breadcrumb-item">
                <a href="index.html" class="breadcrumb-link">Beranda</a>
              </li>
              <li class="breadcrumb-item">
                <span class="breadcrumb-current">UPT Dinas</span>
              </li>
            </ul>
          </nav>
        </div>
        <div class="container saection-container">
          <h2 class="section-title">Unit Pelaksana Teknis</h2>
          <div class="upt-grid">
            <table class="table display" id="table" border="2">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama Puskesmas</th>
                  <th scope="col">Nama Kepala Puskesmas</th>
                  <th scope="col">Alamat Puskesmas</th>
                  <th scope="col">No. Telp</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($puskesmas as $p)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $p->nama }}</td>
                  <td>{{ $p->kepala_puskesmas }}</td>
                  <td>{{ $p->alamat }}</td>
                  <td>{{ $p->no_telp }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

          <nav class="pagination">
            <ul class="pagination-list">

              
            </ul>
          </nav>
        </div>
      </main>

      <!-- Footer -->
      <footer class="site-footer">
        <div class="container footer-container">
          <div class="footer-grid">
            <div class="footer-about">
              <div class="footer-logo">
                <img src="{{ asset('assets/Logo Dinas.png') }}" alt="Logo Footer" class="footer-logo-image"/>
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
    <script src="js/script.js"></script>
    <script src="cdn.datatables.net/2.3.1/js/dataTables.min.js"></script>
  </body>
  <script>
    new DataTable('#table');
  </script>
</html>
