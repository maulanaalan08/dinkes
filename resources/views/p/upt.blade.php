<!doctype html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>UPT Dinas - Dinas Pemerintah</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/styles.css" />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

          <button id="mobile-menu-toggle" class="mobile-menu-toggle" aria-label="Toggle menu mobile" aria-expanded="false">
            <svg xmlns="http://www.w3.org/2000/svg" class="menu-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
      </div>
      <div id="mobile-menu" class="mobile-menu">
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
              required />
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
      <div class="container mt-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb-list">
            <li class="breadcrumb-item"><a href="{{ route('index') }}" class="text-decoration-none">Beranda</a></li>
            <li class="breadcrumb-item active" aria-current="page">UPT Dinas</li>
          </ol>
        </nav>
      </div>


      <!-- TABEL -->
      <div class="container mt-4 mb-5" style="margin-bottom: 120px;">
        <h2 class="section-title mb-4 mt-5">Unit Pelaksana Teknis</h2>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="filter-kecamatan" class="form-label">Filter Kecamatan</label>
            <select id="filter-kecamatan" class="form-select">
              <option value="">Semua Kecamatan</option>
              @foreach ($kecamatanList as $kecamatan)
              <option value="{{ $kecamatan }}">{{ $kecamatan }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label for="filter-kelurahan" class="form-label">Filter Kelurahan</label>
            <select id="filter-kelurahan" class="form-select">
              <option value="">Semua Kelurahan</option>
              @foreach ($kelurahanList as $kelurahan)
              <option value="{{ $kelurahan }}">{{ $kelurahan }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="table-responsive">
          <table id="table" class="table table-striped table-bordered">
            <thead class="table-light">
              <tr>
                <th>No.</th>
                <th>Nama Puskesmas</th>
                <th>Nama Kepala Puskesmas</th>
                <th>Alamat Puskesmas</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>No. Telp</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($puskesmas as $p)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->kepala_puskesmas }}</td>
                <td>{{ $p->alamat }}</td>
                <td class="col-kecamatan">{{ $p->kecamatan }}</td>
                <td class="col-kelurahan">{{ $p->kelurahan }}</td>
                <td>{{ $p->no_telp }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

    </main>

    <!-- Footer -->
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
  <script src="js/script.js"></script>
  <!-- jQuery dan Bootstrap Bundle -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- DataTables JS + Bootstrap Integration -->
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <!-- Inisialisasi DataTables -->
  <script>
    $(document).ready(function() {
      $('#table').DataTable({
        language: {
          search: "Cari:",
          lengthMenu: "Tampilkan _MENU_ entri",
          info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
          paginate: {
            first: "Awal",
            last: "Akhir",
            next: "Berikutnya",
            previous: "Sebelumnya"
          },
          zeroRecords: "Tidak ada data ditemukan",
          infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
          infoFiltered: "(difilter dari _MAX_ total entri)"
        }
      });
    });
  </script>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const kecamatanFilter = document.getElementById('filter-kecamatan');
      const kelurahanFilter = document.getElementById('filter-kelurahan');
      const rows = document.querySelectorAll('#table tbody tr');

      function filterTable() {
        const kecamatanVal = kecamatanFilter.value.toLowerCase();
        const kelurahanVal = kelurahanFilter.value.toLowerCase();

        rows.forEach(row => {
          const kecamatan = row.querySelector('.col-kecamatan')?.textContent.toLowerCase();
          const kelurahan = row.querySelector('.col-kelurahan')?.textContent.toLowerCase();

          const show = (!kecamatanVal || kecamatan.includes(kecamatanVal)) &&
            (!kelurahanVal || kelurahan.includes(kelurahanVal));

          row.style.display = show ? '' : 'none';
        });
      }

      kecamatanFilter.addEventListener('change', filterTable);
      kelurahanFilter.addEventListener('change', filterTable);
    });
  </script>
</body>




</html>