<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>
    
    <div class="card shadow mb-4"> 
        <div class="card-body">
            <a href="<?= site_url('/member/tampilanTambah') ?>" class="btn btn-primary">Tambah Data Anggota</a>
            <hr>
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('berhasil')) : ?>
                <div id="durasi" class="alert alert-success"><?= esc(session()->getFlashdata('berhasil')) ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('gagal')) : ?>
                <div id="durasi" class="alert alert-danger"><?= esc(session()->getFlashdata('gagal')) ?></div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nomor Induk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tempat Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nomor Induk</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Tempat Tanggal Lahir</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1; foreach ($getMember as $info): ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($info['id_anggota']); ?></td>
                                <td><?= esc($info['nama']); ?></td>
                                <td><?= esc($info['jenis_kelamin']); ?></td>
                                <td><?= esc($info['keterangan']); ?></td>
                                <td><?= esc($info['kota_lahir']) . ", " . esc($info['tanggal_lahir']); ?></td>
                                <td><?= esc($info['alamat']); ?></td>
                                <td>
                                    <!-- Edit Anggota -->
                                    <a href="<?= site_url('/member/tampilanEdit/' . $info['id_anggota']) ?>" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <!-- Hapus Anggota -->
                                    <form action="<?= site_url('/member/' . $info['id_anggota']) ?>" method="post" class="d-inline">
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
