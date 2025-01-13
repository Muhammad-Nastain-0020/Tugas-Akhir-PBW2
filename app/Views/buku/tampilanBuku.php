<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= esc($judul) ?></h1>
     
    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="<?= site_url('/buku/tampilanTambah') ?>" class="btn btn-primary">Tambah Data Buku</a>
            <hr>
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('berhasil')) : ?>
                <div id="durasi" class="alert alert-success"><?= esc(session()->getFlashdata('berhasil')) ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')) : ?>
                <div id="durasi" class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Jenis Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Buku</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Jenis Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Penerbit</th>
                            <th scope="col">Tahun Terbit</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; foreach ($Buku as $info): ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($info['id_buku']); ?></td>
                                <td><?= esc($info['judul_buku']); ?></td>
                                <td><?= esc($info['jenis_buku']); ?></td>
                                <td><?= esc($info['penulis']); ?></td>
                                <td><?= esc($info['penerbit']); ?></td>
                                <td><?= esc($info['tahun_terbit']); ?></td>
                                <td><?= esc($info['stok']); ?></td>
                                <td>
                                    <!-- Edit Buku -->
                                    <a href="<?= site_url('/buku/tampilanEdit/' . $info['id_buku']) ?>" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    
                                    <!-- Hapus Buku -->
                                    <form action="<?= site_url('/buku/' . $info['id_buku']) ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button> 
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<?= $this->endSection(); ?>
