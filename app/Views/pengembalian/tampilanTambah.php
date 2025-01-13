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
        <form action="<?= site_url('/pengembalian/tambahPengembalian') ?>" method="POST">
            <?= csrf_field(); ?>
  
            <!-- ID Anggota -->
            <div class="form-group">
                <label for="id_anggota">ID Anggota :</label>
                <input type="number" class="form-control <?= session('validation.id_anggota') ? 'is-invalid' : '' ?>"
                    id="id_anggota" name="id_anggota" placeholder="Nomor ID Anggota" value="<?= old('id_anggota') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.id_anggota') ?>
                </div>
            </div>
            
            <!-- ID Buku -->
            <div class="form-group">
                <label for="id_buku">Kode Buku :</label>
                <input type="text" class="form-control <?= session('validation.id_buku') ? 'is-invalid' : '' ?>"
                    id="id_buku" name="id_buku" placeholder="Masukkan ID Buku" value="<?= old('id_buku') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.id_buku') ?>
                </div>
            </div>
            
            <div class="form-group">
                <label for="id_pengunjung">ID Pengunjung :</label>
                <select class="form-control <?= session('validation.id_pengunjung') ? 'is-invalid' : '' ?>" id="id_pengunjung" name="id_pengunjung">
                    <option value="">----- Pilih ID Pengunjung -----</option>
                    <?php foreach ($pengunjungList as $pengunjung): ?>
                        <option value="<?= $pengunjung->id_pengunjung ?>" <?= old('id_pengunjung') == $pengunjung->id_pengunjung ? 'selected' : '' ?>>
                            <?= esc($pengunjung->id_anggota) . ' - ' . esc($pengunjung->id_pengunjung) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.id_pengunjung') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="id_peminjam">ID Peminjam :</label>
                <select class="form-control <?= session('validation.id_peminjam') ? 'is-invalid' : '' ?>" id="id_peminjam" name="id_peminjam">
                    <option value="">----- Pilih ID Peminjam -----</option>
                    <?php foreach ($peminjamList as $peminjam): ?>
                        <option value="<?= $peminjam->id_peminjam ?>" <?= old('id_peminjam') == $peminjam->id_peminjam ? 'selected' : '' ?>>
                            <?= esc($peminjam->id_anggota) . ' - ' . esc($peminjam->id_peminjam) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.id_peminjam') ?>
                </div>
            </div>

            <!-- Jumlah Buku -->
            <div class="form-group">
                <label for="jumlah">Jumlah Buku :</label>
                <input type="number" class="form-control <?= session('validation.jumlah_kembali') ? 'is-invalid' : '' ?>" id="jumlah" name="jumlah_kembali" placeholder="Masukkan Jumlah Buku" value="<?= old('jumlah_kembali') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.jumlah_kembali') ?>
                </div>
            </div>

            <!-- Button -->
            <a href="<?= site_url('/pengembalian/tampilanPengembalian') ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>