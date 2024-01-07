<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-3">
    <h2>Ubah Data</h2>
    <form method="post" action="/warga/update/<?= $warga['id'] ?>">
        <input type="number" class="form-control visually-hidden" name="id" value="<?= $warga['id'] ?>">
        <input type="number" class="form-control visually-hidden" name="users_id" value="1">
        <input type="number" class="form-control visually-hidden" name="status" value="1">

        <label for="status">Status warga saat ini: </label>
        <?php if ($warga['status'] == 1) : ?>
            <span class="badge text-bg-success">aktif</span>
        <?php else : ?>
            <span class="badge text-bg-danger">non-aktif</span>
        <?php endif ?>
        <br><br>

        <div class="row my-2">
            <label for="status" class="col-sm-2 col-form-label">Ubah status : </label>
            <div class="col-sm-10">
                <input type="radio" class="btn-check" name="aktif" id="success-outlined" autocomplete="off" value="on">
                <label class="btn btn-outline-success" for="success-outlined">Aktif</label>
                <input type="radio" class="btn-check" name="aktif" id="danger-outlined" autocomplete="off" value="off">
                <label class="btn btn-outline-danger" for="danger-outlined">Non Aktif</label>
            </div>
        </div>

        <div class="row">
            <label for="nama" class="col-sm-2 col-form-label">Nama: </label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $warga['nama'] ?>" autofocus required>
            </div>
            <div class="col-sm-5">
                <select class="form-select" name="jenis_kelamin" value="<?= $warga['jenis_kelamin'] ?>" required>
                    <option selected>Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="nik" class="col-sm-2 col-form-label">NIK</label>
                <input type="number" class="form-control" id="nik" name="nik" value="<?= $warga['nik'] ?>" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label">Nomor HP</label>
            <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $warga['no_hp'] ?>" required>
        </div>
        <div class="mb-3 ">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" rows="2" name="alamat" required><?= trim($warga['alamat']) ?></textarea>
        </div>
        <div class="mb-3 ">
            <label for="no_rumah" class="form-label">Nomor Rumah</label>
            <input type="number" class="form-control" id="no_rumah" name="no_rumah" value="<?= $warga['no_rumah'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Ubah Data</button>
    </form>
</div>
<?= $this->endSection(); ?>