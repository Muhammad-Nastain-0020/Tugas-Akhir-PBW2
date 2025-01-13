<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card-header py-3">
        <h1 class="h3 mb-4"><?= esc($judul) ?></h1>
    </div>
    <?php if (session()->getFlashdata('errors')) : ?>
        <div id="durasi" class="alert alert-danger"><?= esc(session()->getFlashdata('errors')) ?></div>
    <?php endif; ?>
  
    <div class="card-body">
        <form action="<?= site_url('/pengunjung/tambahPengunjung') ?>" method="POST">
            <?= csrf_field(); ?>

            <!-- ID Anggota -->
            <div class="form-group">
                <label for="id_anggota">ID Anggota :</label>
                <input type="number" class="form-control <?= session('errors.id_anggota') ? 'is-invalid' : '' ?>"
                    id="id_anggota" name="id_anggota" placeholder="Nomor ID Anggota" value="<?= old('id_anggota') ?>">
                <div class="invalid-feedback">
                    <?= session('errors.id_anggota') ?>
                </div>
            </div>

            <!-- Button -->
            <a href="<?= site_url('/pengunjung/tampilanPengunjung') ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>