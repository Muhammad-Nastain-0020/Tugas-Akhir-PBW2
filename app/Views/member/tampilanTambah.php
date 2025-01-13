<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="card-header py-3">
        <h1 class="h3 mb-4"><?= esc($judul) ?></h1>
    </div>
    <div class="card-body">
        <form action="<?= site_url('/member/tambahMember') ?>" method="POST">
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

            <!-- Nama -->
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control <?= session('validation.nama') ? 'is-invalid' : '' ?>"
                    id="nama" name="nama" placeholder="Nama Lengkap" value="<?= old('nama') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.nama') ?>
                </div>
            </div>

            <!-- Pilih keterangan  -->
            <div class="form-group">
                <label for="keterangan">Pilih Salah Satu :</label>
                <select class="form-control <?= session('validation.keterangan') ? 'is-invalid' : '' ?>" name="keterangan" id="keterangan">
                    <option value="">----- Pilih keterangan -----</option>
                    <option value="Kelas 7" <?= old('keterangan') == 'Kelas 7' ? 'selected' : '' ?>>Kelas 7</option>
                    <option value="Kelas 8" <?= old('keterangan') == 'Kelas 8' ? 'selected' : '' ?>>Kelas 8</option>
                    <option value="Kelas 9" <?= old('keterangan') == 'Kelas 9' ? 'selected' : '' ?>>Kelas 9</option>
                    <option value="Guru" <?= old('keterangan') == 'Guru' ? 'selected' : '' ?>>Guru</option>
                    <option value="Staf" <?= old('keterangan') == 'Staf' ? 'selected' : '' ?>>Staf</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.keterangan') ?>
                </div>
            </div>

            <!-- Jenis Kelamin -->
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin:</label>
                <select class="form-control <?= session('validation.jenis_kelamin') ? 'is-invalid' : '' ?>" name="jenis_kelamin" id="jenis_kelamin">
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" <?= old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="Perempuan" <?= old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                </select>
                <div class="invalid-feedback">
                    <?= session('validation.jenis_kelamin') ?>
                </div>
            </div>

            <!-- Kota Lahir -->
            <div class="form-group">
                <label for="kota_lahir">Tempat Lahir:</label>
                <input type="text" class="form-control <?= session('validation.kota_lahir') ? 'is-invalid' : '' ?>"
                    id="kota_lahir" name="kota_lahir" placeholder="Kota Kelahiran" value="<?= old('kota_lahir') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.kota_lahir') ?>
                </div>
            </div>

            <!-- Tanggal Lahir -->
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" class="form-control <?= session('validation.tanggal_lahir') ? 'is-invalid' : '' ?>"
                    id="tanggal_lahir" name="tanggal_lahir" min="1900-01-01" max="<?= date('Y-m-d') ?>" value="<?= old('tanggal_lahir') ?>">
                <div class="invalid-feedback">
                    <?= session('validation.tanggal_lahir') ?>
                </div>
            </div>

            <!-- Alamat -->
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea class="form-control <?= session('validation.alamat') ? 'is-invalid' : '' ?>" id="alamat" name="alamat" placeholder="Alamat Lengkap" rows="3"><?= old('alamat') ?></textarea>
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