<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- Menampilkan nama lengkap pengguna yang login -->
    <div class="alert alert-info" id="durasi">
        <strong>Selamat datang Admin, <?= session()->get('nama_lengkap'); ?>!</strong>
    </div> 

    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <div class="row">

        <!-- Member Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= site_url('member/tampilanMember'); ?>" class="card border-left-primary shadow h-100 py-2 text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Anggota</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalAnggota ?? 0 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Book Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= site_url('buku/tampilanBuku'); ?>" class="card border-left-success shadow h-100 py-2 text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Buku</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalBuku ?? 0 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Loan Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= site_url('peminjaman/tampilanPeminjaman'); ?>" class="card border-left-warning shadow h-100 py-2 text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Peminjaman</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPeminjaman ?? 0 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Return Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <a href="<?= site_url('pengembalian/tampilanPengembalian'); ?>" class="card border-left-danger shadow h-100 py-2 text-decoration-none">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pengembalian</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalPengembalian ?? 0 ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-undo fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>



<?= $this->endSection(); ?>
