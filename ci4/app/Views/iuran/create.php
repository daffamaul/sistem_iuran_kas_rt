<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>
<div class="container my-3">
    <div class="row">
        <div class="col-8">
            <h2>Tambah Data</h2>
            <form method="post" action="/iuran/save">
                <div class="mb-3">
                    <label for="nama" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" autofocus required>
                </div>
                <select class="form-select mb-3" name="jenis_iuran" required>
                    <option selected>Jenis Iuran</option>
                    <option value="1">Kas</option>
                    <option value="2">Sampah</option>
                    <option value="3">Sumbangan</option>
                </select>
                <select class="form-select mb-3" name="warga_id" required>
                    <option selected>Warga</option>
                    <?php foreach ($warga as $w) : ?>
                        <option value="<?= $w['id'] ?>"><?= $w['nama'] ?></option>
                    <?php endforeach ?>
                </select>
                <div class="input-group mb-3">
                    <span class="input-group-text">Rp.</span>
                    <input type="number" class="form-control" name="nominal">
                    <span class="input-group-text">.00</span>
                </div>
                <div class="mb-3 ">
                    <label for="alamat" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="alamat" rows="2" name="keterangan" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>