<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="<?= site_url('/pengembalian/tampilanTambah') ?>" class="btn btn-primary">Tambah Data Pengembalian</a>
            <hr>
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('berhasil')) : ?>
                <div id="durasi" class="alert alert-success"><?= esc(session()->getFlashdata('berhasil')) ?></div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Anggota</th>
                            <th scope="col">Nama</th>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Jenis Buku</th>
                            <th scope="col">Jumlah Pinjam</th>
                            <th scope="col">Jumlah Kembali</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Denda</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Anggota</th>
                            <th scope="col">Nama</th>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Jenis Buku</th>
                            <th scope="col">Jumlah Pinjam</th>
                            <th scope="col">Jumlah Kembali</th>
                            <th scope="col">Tanggal Pinjam</th>
                            <th scope="col">Tanggal Kembali</th>
                            <th scope="col">Denda</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($kembali as $info): ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($info['id_anggota']); ?></td>
                                <td><?= esc($info['nama']); ?></td>
                                <td><?= esc($info['id_buku']); ?></td>
                                <td><?= esc($info['judul_buku']); ?></td>
                                <td><?= esc($info['jenis_buku']); ?></td>
                                <td><?= esc($info['jumlah']); ?></td>
                                <td><?= esc($info['jumlah_kembali']); ?></td>
                                <td><?= esc($info['tanggal_pinjam']); ?></td>
                                <td><?= esc($info['tanggal_kembali']); ?></td>
                                <td><?= esc($info['denda']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

</div>
<!-- /.container-fluid -->
 
<?= $this->endSection(); ?>