<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800"><?= $judul ?></h1>   
    <div class="card shadow mb-4">
        <div class="card-body">
            <a href="<?= site_url('/pengunjung/tampilanTambah') ?>" class="btn btn-primary">Tambah Data Pengunjung</a>     
            <hr>
            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('berhasil')) : ?>
                <div id="durasi" class="alert alert-success"><?= esc(session()->getFlashdata('berhasil')) ?></div>
            <?php endif; ?>

            <?php if (session()->getFlashdata('error')) : ?>
                <div id="durasi" class="alert alert-success"><?= esc(session()->getFlashdata('error')) ?></div>
            <?php endif; ?>
            
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Pengunjung</th>
                            <th scope="col">ID Anggota</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Waktu Kunjungan</th>
                            <th scope="col">Keperluan</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID Pengunjung</th>
                            <th scope="col">ID Anggota</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Waktu Kunjungan</th>
                            <th scope="col">Keperluan</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $i = 1;
                        foreach ($Pengunjung as $info): ?>
                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= esc($info['id_pengunjung']); ?></td>
                                <td><?= esc($info['id_anggota']); ?></td>
                                <td><?= esc($info['nama']); ?></td>
                                <td><?= esc($info['waktu_kunjungan']); ?></td>
                                <td><?= esc($info['keperluan']); ?></td>
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