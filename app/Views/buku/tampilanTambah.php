<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card-header py-3">
        <h1 class="h3 mb-4"><?= esc($judul) ?></h1>
    </div>
    <div class="card-body">
        <form action="<?= site_url('/buku/tambahBuku') ?>" method="POST">
            <?= csrf_field(); ?>

            <!-- ID BUKU -->
            <div class="form-group">
                <label for="id_buku">ID Buku :</label>
                <input type="text" class="form-control <?= session('validation.id_buku') ? 'is-invalid' : '' ?>"
                    id="id_buku" name="id_buku" placeholder="Masukkan Nomor ID Buku" value="<?= old('id_buku') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.id_buku') ?>
                </div>
            </div>

            <!-- Judul Buku -->
            <div class="form-group">
                <label for="judul_buku">Judul Buku :</label>
                <input type="text" class="form-control <?= session('validation.judul_buku') ? 'is-invalid' : '' ?>"
                    id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" value="<?= old('judul_buku') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.judul_buku') ?>
                </div>
            </div>

            <!-- Jenis Buku -->
            <div class="form-group">
                <label for="jenis_buku">Jenis Buku:</label>
                <select class="form-control <?= session('validation.jenis_buku') ? 'is-invalid' : '' ?>" name="jenis_buku" id="jenis_buku">
                    <option value="">-- Pilih Jenis Buku --</option>
                    <option value="Buku Paket" <?= old('jenis_buku') == 'Buku Paket' ? 'selected' : '' ?>>Buku Paket</option>
                    <option value="Buku Non-Paket" <?= old('jenis_buku') == 'Buku Non-Paket' ? 'selected' : '' ?>>Buku Non-Paket</option>
                    <option value="Buku Rumus" <?= old('jenis_buku') == 'Buku Rumus' ? 'selected' : '' ?>>Buku Rumus</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.jenis_buku') ?>
                </div>
            </div>

            <!-- Penulis Buku -->
            <div class="form-group">
                <label for="penulis">Penulis Buku :</label>
                <input type="text" class="form-control <?= session('validation.penulis') ? 'is-invalid' : '' ?>"
                    id="penulis" name="penulis" placeholder="Masukkan Penulis Buku" value="<?= old('penulis') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.penulis') ?>
                </div>
            </div>

            <!-- Penerbit Buku -->
            <div class="form-group">
                <label for="penerbit">Penerbit Buku :</label>
                <input type="text" class="form-control <?= session('validation.penerbit') ? 'is-invalid' : '' ?>"
                    id="penerbit" name="penerbit" placeholder="Masukkan Penerbit Buku" value="<?= old('penerbit') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.penerbit') ?>
                </div>
            </div>

            <!-- Tahun Terbit -->
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit :</label>
                <input type="number" class="form-control <?= session('validation.tahun_terbit') ? 'is-invalid' : '' ?>"
                    id="tahun_terbit" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" value="<?= old('tahun_terbit') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.tahun_terbit') ?>
                </div>
            </div>

            <!-- Stok Buku -->
            <div class="form-group">
                <label for="stok">Stok Buku :</label>
                <input type="number" class="form-control <?= session('validation.stok') ? 'is-invalid' : '' ?>"
                    id="stok" name="stok" placeholder="Masukkan Stok Buku" value="<?= old('stok') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.stok') ?>
                </div>
            </div>


            <!-- Button -->
            <a href="<?= site_url('/buku/tampilanBuku') ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div> 

<?= $this->endSection(); ?>