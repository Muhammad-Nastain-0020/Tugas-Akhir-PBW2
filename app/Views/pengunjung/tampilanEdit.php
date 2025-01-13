<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card-header py-3">
        <h1 class="h3 mb-4"><?= esc($judul) ?></h1>
    </div>
    <div class="card-body">

        <?php if (session()->getFlashdata('error')) : ?>
            <div id="durasi" class="alert alert-success"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>

        <form action="<?= site_url('/pengunjung/ubahPengunjung') ?>" method="POST">
            <?= csrf_field(); ?>

            <!-- ID Anggota (readonly) -->
            <div class="form-group">
                <label for="id_anggota">ID Anggota :</label>
                <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?= esc($pengunjung['id_anggota']) ?>" readonly>
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="id_pengunjung" name="id_pengunjung" value="<?= esc($pengunjung['id_pengunjung']) ?>" readonly>
            </div>

            <!-- Keperluan -->
            <div class="form-group">
                <label for="keperluan">Keperluan :</label>
                <select class="form-control <?= session('errors.keperluan') ? 'is-invalid' : '' ?>" name="keperluan" id="keperluan">
                    <option value="">----- Tujuan datang ke Perpustakaan -----</option>
                    <option value="Membaca Buku" <?= old('keperluan', $pengunjung['keperluan']) == 'Membaca Buku' ? 'selected' : '' ?>>Membaca Buku</option>
                    <option value="Meminjam Buku" <?= old('keperluan', $pengunjung['keperluan']) == 'Meminjam Buku' ? 'selected' : '' ?>>Meminjam Buku</option>
                    <option value="Mengembalikan Buku" <?= old('keperluan', $pengunjung['keperluan']) == 'Menggembalikan Buku' ? 'selected' : '' ?>>Mengembalikan Buku</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('errors.keperluan') ?>
                </div>
            </div>

            <!-- Button -->
            <a href="<?= site_url('/pengunjung/tampilanPengunjung') ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>