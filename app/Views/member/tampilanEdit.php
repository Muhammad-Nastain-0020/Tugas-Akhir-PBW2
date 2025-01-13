<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= esc($judul) ?></h1>
    
    <div class="card-body bg-gray-100">

        <?php if (session()->getFlashdata('gagal')) : ?>
            <div id="durasi" class="alert alert-danger"><?= esc(session()->getFlashdata('gagal')) ?></div>
        <?php endif; ?>
        
        <form action="<?= site_url('/member/ubahMember') ?>" method="POST">
            <?= csrf_field(); ?>

            <!-- ID Anggota (readonly) -->
            <div class="form-group">
                <label for="id_anggota">ID Anggota :</label>
                <input type="text" class="form-control" id="id_anggota" name="id_anggota" value="<?= esc($member['id_anggota']) ?>" readonly>
            </div>

            <!-- Nama -->
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control <?= session('validation.nama') ? 'is-invalid' : '' ?>"
                    id="nama" name="nama" placeholder="Nama Lengkap" value="<?= old('nama', $member['nama']) ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nama') ?>
                </div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group"> 
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select class="form-control <?= session('validation.jenis_kelamin') ? 'is-invalid' : '' ?>" name="jenis_kelamin" id="jenis_kelamin">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" <?= old('jenis_kelamin', $member['jenis_kelamin']) == 'Laki-laki' ? 'selected' : '' ?>>Laki-Laki</option>
                    <option value="Perempuan" <?= old('jenis_kelamin', $member['jenis_kelamin']) == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.jenis_kelamin') ?>
                </div>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan:</label>
                <select class="form-control <?= session('validation.keterangan') ? 'is-invalid' : '' ?>" name="keterangan" id="keterangan">
                    <option value="">----- Pilih -----</option>
                    <option value="Kelas 7" <?= old('keterangan', $member['keterangan']) == 'Kelas 7' ? 'selected' : '' ?>>Kelas 7</option>
                    <option value="Kelas 8" <?= old('keterangan', $member['keterangan']) == 'Kelas 8' ? 'selected' : '' ?>>Kelas 8</option>
                    <option value="Kelas 9" <?= old('keterangan', $member['keterangan']) == 'Kelas 9' ? 'selected' : '' ?>>Kelas 9</option>
                    <option value="Guru" <?= old('keterangan', $member['keterangan']) == 'Guru' ? 'selected' : '' ?>>Guru</option>
                    <option value="Staf" <?= old('keterangan', $member['keterangan']) == 'Staf' ? 'selected' : '' ?>>Staf</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.keterangan') ?>
                </div>
            </div>

            <!-- Kota Lahir -->
            <div class="form-group">
                <label for="kota_lahir">Tempat Lahir:</label>
                <input type="text" class="form-control <?= session('validation.kota_lahir') ? 'is-invalid' : '' ?>"
                    id="kota_lahir" name="kota_lahir" placeholder="Kota Kelahiran" value="<?= old('kota_lahir', $member['kota_lahir']) ?>">
                <div class="invalid-feedback">
                    <?= session('validation.kota_lahir') ?>
                </div>
            </div>

            <!-- Tanggal Lahir -->
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control <?= session('validation.tanggal_lahir') ? 'is-invalid' : '' ?>"
                    id="tanggal_lahir" name="tanggal_lahir" min="1900-01-01" max="<?= date('Y-m-d') ?>" value="<?= old('tanggal_lahir', $member['tanggal_lahir']) ?>">
                <div class="invalid-feedback">
                    <?= session('validation.tanggal_lahir') ?>
                </div>
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control <?= session('validation.alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="3"><?= old('alamat', $member['alamat']) ?></textarea>
                <div class="invalid-feedback">
                    <?= session('validation.alamat') ?>
                </div>
            </div>

            <!-- Button -->
            <a href="<?= site_url('/member/tampilanMember') ?>" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>