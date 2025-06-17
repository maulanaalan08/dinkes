<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dinas Kesehatan Surabaya</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-3" href="/layanan">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Dinas Kesehatan Surabaya </div>
            </a>
            <hr class="sidebar-divider my-0">

            @if ($role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('layanan.admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Approve Layanan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('puskesmas.admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Approve Puskesmas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('berita.admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Approve Berita</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('beranda.admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Approve Beranda</span>
                </a>
            </li>
            
            <hr class="sidebar-divider my-0">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('pengaduan.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Pengaduan</span>
                </a>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.layanan') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Layanan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('puskesmas.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Puskesmas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('berita.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Berita</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('beranda.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Beranda</span>
                </a>
            </li>
            @endif
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="btn btn-danger">logout</span>
                </a>
            </li>
        </ul>
        <div id="content-wrapper" class="d-flex flex-column">
            <br>
            <div id="content">
                <div class="container-fluid">
                    <h1 class="h3 mb-2 text-gray-800">Tambah Puskesmas</h1>
                    <form method="post" action="{{ route('puskesmas.create') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Puskesmas</label>
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama UPT Puskesmas">
                        </div>
                        <div class="mb-3">
                            <label for="kepala_puskesmas" class="form-label">Kepala Puskesmas</label>
                            <input type="text" class="form-control" id="kepala_puskesmas" name="kepala_puskesmas" placeholder="Masukkan Nama Kepala Puskesmas">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat Puskesmas</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat Puskesmas">
                        </div>
                        <div class="mb-3">
                            <label for="kecamatan" class="form-label">Kecamatan Puskesmas</label>
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Masukkan kecamatan Puskesmas">
                        </div>
                        <div class="mb-3">
                            <label for="kelurahan" class="form-label">Kelurahan Puskesmas</label>
                            <input type="text" class="form-control" id="kelurahan" name="kelurahan" placeholder="Masukkan kelurahan Puskesmas">
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Telepon Puskesmas</label>
                            <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan No. Telepon">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2024</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>