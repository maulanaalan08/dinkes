<!doctype html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Berita - Dinas Pemerintah</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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
          <a href="{{ route('berita') }}" class="filter-button {{ request('jenis_berita') == null ? 'active' : '' }}">Semua</a>
          <a href="{{ route('berita', ['jenis_berita' => 'Pengumuman']) }}" class="filter-button {{ request('jenis_berita') == 'Pengumuman' ? 'active' : '' }}">Pengumuman</a>
          <a href="{{ route('berita', ['jenis_berita' => 'Kegiatan']) }}" class="filter-button {{ request('jenis_berita') == 'Kegiatan' ? 'active' : '' }}">Kegiatan</a>
          <a href="{{ route('berita', ['jenis_berita' => 'Artikel']) }}" class="filter-button {{ request('jenis_berita') == 'Artikel' ? 'active' : '' }}">Artikel</a>
        </div>


        @inject('str', 'Illuminate\Support\Str')
        <div id="news-container" class="news-grid">
          @foreach ($berita as $b)
          <article class="news-card text-center mb-4">
            <img src="{{ asset('berita/' . $b->gambar) }}" alt="{{ $b->gambar }}" style="width:300px; height:400px" class="news-image" />
            <h3 class="news-title">{{ $b->judul }}</h3>
            <p class="card-text">{{ $str->limit($b->detail, 50) }}</p>
            <!-- Tombol untuk buka modal -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalBerita{{ $b->id_berita }}">
              Baca selengkapnya
            </button>
          </article>
          <!-- Modal unik -->
          <div class="modal fade" id="modalBerita{{ $b->id_berita }}" tabindex="-1" aria-labelledby="modalLabel{{ $b->id_berita }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalLabel{{ $b->id_berita }}">{{ $b->judul }}</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <img src="{{ asset('berita/' . $b->gambar) }}" alt="{{ $b->judul }}" class="img-fluid mb-3">
                  <p>{{ $b->detail }}</p>
                </div>
              </div>
            </div>
          </div>

          @endforeach
        </div>

        <div class="d-flex justify-content-center mt-4">
          <ul class="pagination">

            {{-- Tombol Sebelumnya --}}
            @if ($berita->onFirstPage())
            <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
            @else
            <li class="page-item">
              <a class="page-link" href="{{ $berita->appends(request()->query())->previousPageUrl() }}" rel="prev">&laquo;</a>
            </li>
            @endif

            {{-- Nomor halaman --}}
            @for ($i = 1; $i <= $berita->lastPage(); $i++)
              <li class="page-item {{ ($i == $berita->currentPage()) ? 'active' : '' }}">
                <a class="page-link" href="{{ $berita->appends(request()->query())->url($i) }}">{{ $i }}</a>
              </li>
              @endfor

              {{-- Tombol Selanjutnya --}}
              @if ($berita->hasMorePages())
              <li class="page-item">
                <a class="page-link" href="{{ $berita->appends(request()->query())->nextPageUrl() }}" rel="next">&raquo;</a>
              </li>
              @else
              <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
              @endif

          </ul>
        </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</html>