<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= esc($judul) ?></h1>
    
    <div class="card-body bg-gray-100">
        
        <?php if (session()->getFlashdata('error')) : ?>
                <div id="durasi" class="alert alert-success"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>
        <form action="<?= site_url('/buku/ubahBuku') ?>" method="POST">
            <?= csrf_field(); ?>

            <!-- ID Anggota (readonly) -->
            <div class="form-group">
                <label for="id_buku">ID Anggota :</label>
                <input type="text" class="form-control" id="id_buku" name="id_buku" value="<?= esc($buku['id_buku']) ?>" readonly>
            </div>

            <!-- Judul Buku  -->
            <div class="form-group">
                <label for="judul_buku">Judul Buku :</label>
                <input type="text" class="form-control <?= session('validation.judul_buku') ? 'is-invalid' : '' ?>"
                    id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku " value="<?= old('judul_buku', $buku['judul_buku']) ?>">
                <div class="invalid-feedback">
                    <?= session('validation.judul_buku') ?>
                </div>
            </div>

            <!-- Jenis Buku -->
            <div class="form-group">
                <label for="jenis_buku">Jenis Buku:</label>
                <select class="form-control <?= session('validation.jenis_buku') ? 'is-invalid' : '' ?>" name="jenis_buku" id="jenis_buku">
                    <option value="">----- Pilih Jenis Buku -----</option>
                    <option value="Buku Paket" <?= old('jenis_buku', $buku['jenis_buku']) == 'Buku Paket' ? 'selected' : '' ?>>Buku Paket</option>
                    <option value="Buku Non-Paket" <?= old('jenis_buku', $buku['jenis_buku']) == 'Buku Non-Paket' ? 'selected' : '' ?>>Buku Non-Paket</option>
                    <option value="Buku Rumus" <?= old('jenis_buku', $buku['jenis_buku']) == 'Buku Rumus' ? 'selected' : '' ?>>Buku Rumus</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.jenis_buku') ?>
                </div>
            </div>

            <!-- Penulis Buku  -->
            <div class="form-group">
                <label for="penulis">Penulis Buku :</label>
                <input type="text" class="form-control <?= session('validation.penulis') ? 'is-invalid' : '' ?>"
                    id="penulis" name="penulis" placeholder="Masukkan Penulis Buku " value="<?= old('penulis', $buku['penulis']) ?>">
                <div class="invalid-feedback">
                    <?= session('validation.penulis') ?>
                </div>
            </div>

            <!-- Penerbit Buku  -->
            <div class="form-group">
                <label for="penerbit">Penerbit Buku :</label>
                <input type="text" class="form-control <?= session('validation.penerbit') ? 'is-invalid' : '' ?>"
                    id="penerbit" name="penerbit" placeholder="Masukkan Penerbit Buku " value="<?= old('penerbit', $buku['penerbit']) ?>">
                <div class="invalid-feedback">
                    <?= session('validation.penerbit') ?>
                </div>
            </div>

            <!-- Tahun Terbit  -->
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit :</label>
                <input type="number" class="form-control <?= session('validation.tahun_terbit') ? 'is-invalid' : '' ?>"
                    id="tahun_terbit" name="tahun_terbit" placeholder="Masukkan Tahun Terbit " value="<?= old('tahun_terbit', $buku['tahun_terbit']) ?>">
                <div class="invalid-feedback">
                    <?= session('validation.tahun_terbit') ?>
                </div>
            </div>

            <!-- Stok Buku  -->
            <div class="form-group">
                <label for="stok">Stok Buku :</label>
                <input type="number" class="form-control <?= session('validation.stok') ? 'is-invalid' : '' ?>"
                    id="stok" name="stok" placeholder="Masukkan Stok Buku " value="<?= old('stok', $buku['stok']) ?>">
                <div class="invalid-feedback">
                    <?= session('validation.judul_buku') ?>
                </div>
            </div>

            <!-- Button -->
            <a href="<?= site_url('/buku/tampilanBuku') ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>