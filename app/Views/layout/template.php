<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Dashboard E-Perpus">
    <meta name="author" content="Admin Perpustakaan">

    <title><?= $judul ?></title>

    <!-- Font for template -->
    <link href="<?= base_url('templates/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

    <!-- Custom styles for template -->
    <link href="<?= base_url('templates/css/sb-admin-2.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('templates/vendor/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion border-right-dark" id="accordionSidebar">
            
        <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= site_url('/') ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="sidebar-brand-text mx-3">PERPUS SMPN 1</div>
            </a>
            <div class="nav-link mt-3 mb-3 text-center">
                <img class="img-profile rounded-circle" alt="Foto Admin" src="<?= base_url('templates/img/23.240.0020.jpg') ?>" style="width : 50px; height: 50px;"><br><br>
                <h6 class="sidebar-brand-text mx-3 text-gray-100 small"><?= session()->get('nama_lengkap'); ?></h6>
            </div>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Menu - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('/') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Menu</div>

            <!-- Dropdown - Data Master -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= site_url('/buku/tampilanBuku') ?>">Data Buku</a>
                        <a class="collapse-item" href="<?= site_url('/member/tampilanMember') ?>">Data Anggota</a>
                    </div>
                </div>
            </li>

            <!-- Dropdown - Data Pengunjung -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePengunjung" aria-expanded="true" aria-controls="collapsePengunjung">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Pengunjung</span>
                </a>
                <div id="collapsePengunjung" class="collapse" aria-labelledby="headingPengunjung" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= site_url('/pengunjung/tampilanPengunjung') ?>">Pengunjung Hari Ini</a>
                        <a class="collapse-item" href="<?= site_url('/pengunjung/pengunjungBulanIni') ?>">Pengunjung Bulan Ini</a>
                        <a class="collapse-item" href="<?= site_url('/pengunjung/pengunjungTahunIni') ?>">Pengunjung Tahun Ini</a>
                        <a class="collapse-item" href="<?= site_url('/pengunjung/semuaPengunjung') ?>">Semua Pengunjung</a>

                    </div>
                </div>
            </li>


            <!-- Dropdown - Transaksi -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTransaksi">
                    <i class="fas fa-fw fa-exchange-alt"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= site_url('peminjaman/tampilanPeminjaman') ?>">Peminjaman</a>
                        <a class="collapse-item" href="<?= site_url('pengembalian/tampilanPengembalian') ?>">Pengembalian</a>
                    </div>
                </div>
            </li>

            <!-- Dropdown - Laporan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="true" aria-controls="collapseLaporan">
                    <i class="fas fa-fw fa-chart-bar"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= site_url('pengunjung/laporanPengunjung') ?>">Laporan Pengunjung</a>
                        <a class="collapse-item" href="<?= site_url('pengembalian/laporanPengembalian') ?>">Laporan Pengembalian</a>
                    </div>
                </div>
            </li>
 

            <!-- Tombol Logout -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= site_url('/logout') ?>" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-primary bg-primary topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Sidebar Toggle Button -->
                    <div class="text-center d-none d-md-inline">
                        <button class="btn btn-primary border-0" id="sidebarToggle">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>

                    <!-- Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-100 small"><?= session()->get('nama_lengkap'); ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('templates/img/23.240.0020.jpg') ?>">
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->


                <?= $this->renderSection('content') ?>

            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <?= date('Y') ?> Muhammad Nastain</span>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= site_url('/logout') ?>">Logout</a>

                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url('templates/vendor/jquery/jquery.min.js') ?>"></script>
    <script src="<?= base_url('templates/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('templates/js/sb-admin-2.min.js') ?>"></script>
    <script src="<?= base_url('templates/js/demo/chart-bar-demo.js') ?>"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('templates/vendor/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('templates/vendor/datatables/dataTables.bootstrap4.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('templates/js/demo/datatables-demo.js') ?>"></script>
    <script src="<?= base_url('templates/js/durasi.js') ?>"></script>
    <!-- Page level plugins -->
    <script src="<?= base_url('templates/vendor/chart.js/Chart.min.js') ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('templates/js/demo/chart-bar-demo.js') ?>"></script>
</body>

</html>