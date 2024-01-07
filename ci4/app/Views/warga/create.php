<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-3">
    <div class="row">
        <div class="col-8">
            <h2>Tambah Data</h2>
            <form method="post" action="/kaswarga/save">
                <input type="number" class="form-control visually-hidden" name="users_id" value="1">
                <input type="number" class="form-control visually-hidden" name="status" value="1">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" autofocus required>
                </div>
                <div class="mb-3 ">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="number" class="form-control" id="nik" name="nik" required>
                </div>
                <select class="form-select" name="jenis_kelamin" required>
                    <option selected>Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <div class="mb-3 ">
                    <label for="no_hp" class="form-label">Nomor HP</label>
                    <input type="number" class="form-control" id="no_hp" name="no_hp" required>
                </div>
                <div class="mb-3 ">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="2" name="alamat" required></textarea>
                </div>
                <div class="mb-3 ">
                    <label for="no_rumah" class="form-label">Nomor Rumah</label>
                    <input type="number" class="form-control" id="no_rumah" name="no_rumah" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>